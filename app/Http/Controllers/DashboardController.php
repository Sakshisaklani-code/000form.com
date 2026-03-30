<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Project;
use App\Models\Submission;
use App\Models\FormValidation;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    // =========================================================================
    // WORKSPACE HELPERS
    // =========================================================================

    /**
     * Get the active workspace owner ID from session.
     * Returns logged-in user's own ID if no workspace is active.
     */
    protected function getActiveOwnerId(): string
    {
        return session('active_workspace', Auth::id());
    }

    /**
     * Get the active workspace owner User model.
     * Returns Auth::user() when viewing own workspace (avoids extra DB query).
     */
    protected function getActiveOwner(): User
    {
        $ownerId = $this->getActiveOwnerId();
        return $ownerId === Auth::id() ? Auth::user() : User::findOrFail($ownerId);
    }

    /**
     * Get the current user's role in the active workspace.
     * Returns 'owner' if viewing own workspace.
     */
    protected function getCurrentRole(): string
    {
        $user    = Auth::user();
        $ownerId = $this->getActiveOwnerId();

        if ($ownerId === $user->id) {
            return 'owner';
        }

        $member = TeamMember::where('workspace_owner_id', $ownerId)
            ->where('member_user_id', $user->id)
            ->first();

        return $member?->role ?? 'viewer';
    }

    /**
     * Check if current user can perform an action.
     *
     * owner  → all actions
     * admin  → all except billing
     * editor → view + create + edit (not delete, not manage team)
     * viewer → view only
     */
    protected function canDo(string $action): bool
    {
        $role = $this->getCurrentRole();

        return match($action) {
            'view'        => in_array($role, ['owner', 'admin', 'editor', 'viewer']),
            'create_form' => in_array($role, ['owner', 'admin', 'editor']),
            'edit_form'   => in_array($role, ['owner', 'admin', 'editor']),
            'delete_form' => in_array($role, ['owner', 'admin']),
            'manage_team' => in_array($role, ['owner', 'admin']),
            'billing'     => $role === 'owner',
            // Project permissions
            'view_project'  => in_array($role, ['owner', 'admin', 'editor', 'viewer']),
            'create_project'=> in_array($role, ['owner', 'admin', 'editor']),
            'edit_project'  => in_array($role, ['owner', 'admin', 'editor']),
            'delete_project'=> in_array($role, ['owner', 'admin']),
            default       => false,
        };
    }

    /**
     * Get a Form query scoped to the active workspace owner.
     */
    protected function workspaceForms()
    {
        return Form::where('user_id', $this->getActiveOwnerId());
    }

    /**
     * Get a Project query scoped to the active workspace owner.
     */
    protected function workspaceProjects()
    {
        return Project::forUser($this->getActiveOwnerId());
    }

    // =========================================================================
    // DASHBOARD INDEX
    // =========================================================================

    /**
     * Show dashboard home with forms grouped by project.
     * Standalone legacy forms (project_id IS NULL) shown separately.
     */
    public function index()
    {
        $user    = Auth::user();
        $ownerId = $this->getActiveOwnerId();

        // ── Active projects with their forms eagerly loaded ───────────────────
        $projects = Project::forUser($ownerId)
            ->active()
            ->with(['forms' => function ($q) {
                $q->withCount([
                    'submissions as unread_count' => fn($q) => $q->where('is_spam', false)
                        ->where('is_archived', false)
                        ->where('is_read', false),
                    'submissions as valid_count'  => fn($q) => $q->where('is_spam', false)
                        ->where('is_archived', false),
                    'submissions as spam_count'   => fn($q) => $q->where('is_spam', true)
                        ->where('is_archived', false),
                ])->orderBy('created_at', 'desc');
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        // ── Standalone (legacy) forms — project_id IS NULL ────────────────────
        // These were created before the project feature existed and are kept as-is.
        $standaloneForms = Form::where('user_id', $ownerId)
            ->standalone()
            ->withCount([
                'submissions as unread_count' => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false)
                    ->where('is_read', false),
                'submissions as valid_count'  => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false),
                'submissions as spam_count'   => fn($q) => $q->where('is_spam', true)
                    ->where('is_archived', false),
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        // ── Flat list (kept for backwards compat with any existing partials) ──
        $forms = Form::where('user_id', $ownerId)
            ->withCount([
                'submissions as unread_count' => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false)
                    ->where('is_read', false),
                'submissions as valid_count'  => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false),
                'submissions as spam_count'   => fn($q) => $q->where('is_spam', true)
                    ->where('is_archived', false),
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_forms'       => $forms->count(),
            'total_projects'    => $projects->count(),   // ← needed by dashboard view stats grid
            'total_submissions' => $forms->sum('submission_count'),
            'total_valid'       => $forms->sum('valid_count'),
            'total_spam'        => $forms->sum('spam_count'),
            'total_unread'      => $forms->sum('unread_count'),
            'forms_this_month'  => Form::where('user_id', $ownerId)
                ->where('created_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        return view('dashboard.index', compact('projects', 'standaloneForms', 'forms', 'stats'));
    }

    // =========================================================================
    // CHART DATA
    // =========================================================================

    /**
     * Prepare chart data for forms created over time (last 30 days).
     */
    private function prepareChartData($user)
    {
        $ownerId      = $this->getActiveOwnerId();
        $formsGrouped = Form::where('user_id', $ownerId)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $chartData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date        = now()->subDays($i);
            $dateKey     = $date->format('Y-m-d');
            $chartData[] = [
                'label' => $date->format('M j'),
                'count' => $formsGrouped->get($dateKey)?->count ?? 0,
            ];
        }

        return $chartData;
    }

    // =========================================================================
    // FORM CRUD
    // =========================================================================

    /**
     * Show form creation page.
     *
     * NEW BEHAVIOUR:
     *   - Requires a project to exist. If none exist, redirects to project creation.
     *   - Accepts ?project_id= query param to pre-select a project in the dropdown.
     *   - New forms always belong to a project — no standalone creation allowed.
     *   - Existing standalone legacy forms (project_id = null) are unaffected.
     */
    public function createForm(Request $request)
    {
        if (! $this->canDo('create_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create forms in this workspace.');
        }

        $ownerId = $this->getActiveOwnerId();

        // All active projects for the required dropdown
        $projects = Project::forUser($ownerId)
            ->active()
            ->orderBy('name')
            ->get();

        // If no projects exist yet, redirect to create one first
        if ($projects->isEmpty()) {
            return redirect()->route('dashboard.projects.create')
                ->with('message', 'Create a project first, then add forms inside it.');
        }

        // Pre-select project if project_id is passed in query string
        $selectedProject = null;
        if ($request->filled('project_id')) {
            $selectedProject = Project::forUser($ownerId)
                ->where('id', $request->project_id)
                ->first();
        }

        // Verified emails for recipient_email dropdown
        $verifiedEmails = \App\Models\UserEmail::where('user_id', Auth::id())
            ->where('is_verified', true)
            ->pluck('email')
            ->prepend(Auth::user()->email)
            ->unique()
            ->values();

        return view('dashboard.forms.create', compact('projects', 'selectedProject', 'verifiedEmails'));
    }

    /**
     * Store a new form — always inside a project (project_id is required).
     */
    public function storeForm(Request $request)
    {
        if (! $this->canDo('create_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create forms in this workspace.');
        }

        $validated = $request->validate([
            'name'                  => 'required|string|max:100',
            'recipient_email'       => 'required|email|max:255',
            'project_id'            => 'required|uuid|exists:projects,id',  // REQUIRED — no standalone
            'cc_emails'             => 'nullable|string|max:500',
            'redirect_url'          => 'nullable|url|max:500',
            'success_message'       => 'nullable|string|max:500',
            'auto_response_enabled' => 'boolean',
            'auto_response_message' => 'nullable|string',
            'honeypot_enabled'      => 'nullable|boolean',
            'email_notifications'   => 'nullable|boolean',
            'store_submissions'     => 'nullable|boolean',
        ]);

        // Confirm the project belongs to this workspace
        Project::where('id', $validated['project_id'])
            ->where('user_id', $this->getActiveOwnerId())
            ->firstOrFail();

        $ccEmails = null;
        if ($request->filled('cc_emails')) {
            $ccEmails = array_map('trim', explode(',', $request->input('cc_emails')));
            $ccEmails = array_filter($ccEmails, fn($e) => filter_var($e, FILTER_VALIDATE_EMAIL));
            $ccEmails = array_values($ccEmails);
        }

        $autoResponseMessage = $request->input('auto_response_message');
        if ($autoResponseMessage) {
            $autoResponseMessage = str_replace('{form_name}', $request->input('name'), $autoResponseMessage);
        }

        $owner = $this->getActiveOwner();

        $form = $owner->forms()->create([
            'name'                  => $validated['name'],
            'recipient_email'       => $validated['recipient_email'],
            'cc_emails'             => $ccEmails,
            'redirect_url'          => $validated['redirect_url'] ?? null,
            'success_message'       => $validated['success_message'] ?? 'Thank you for your submission!',
            'auto_response_enabled' => $request->boolean('auto_response_enabled'),
            'auto_response_message' => $autoResponseMessage,
            'email_notifications'   => $request->boolean('email_notifications', true),
            'store_submissions'     => $request->boolean('store_submissions', true),
            'honeypot_enabled'      => $request->boolean('honeypot_enabled', true),
            'status'                => 'active',
            'archive_when_paused'   => true,
            'project_id'            => $validated['project_id'],
        ]);

        $this->sendVerificationEmail($form);

        return redirect()
            ->route('dashboard.projects.show', $form->project_id)
            ->with('message', "Form \"{$form->name}\" created! Please verify the recipient email address.");
    }

    /**
     * Show form details with filtered/tabbed submissions.
     */
    public function showForm(string $id)
    {
        $form = $this->workspaceForms()->findOrFail($id);

        $tab    = request('tab', 'valid');
        $search = trim(request('search', ''));
        $panel  = request('panel', 'submissions');

        $baseQuery = $form->submissions();

        if ($tab === 'archive') {
            $baseQuery->where('is_archived', true);
        } elseif ($tab === 'spam') {
            $baseQuery->where('is_archived', false)
                ->where('is_spam', true);
        } else {
            $baseQuery->where('is_archived', false)
                ->where('is_spam', false);
        }

        if ($search !== '' && $tab !== 'archive') {
            $lower = '%' . strtolower($search) . '%';
            $baseQuery->where(function ($q) use ($lower) {
                $q->whereRaw("LOWER(data->>'name') LIKE ?", [$lower])
                    ->orWhereRaw("LOWER(data->>'email') LIKE ?", [$lower])
                    ->orWhereRaw("LOWER(data->>'message') LIKE ?", [$lower])
                    ->orWhereRaw("LOWER(data->>'phone') LIKE ?", [$lower])
                    ->orWhereRaw("LOWER(data::text) LIKE ?", [$lower]);
            });
        }

        $submissions  = $baseQuery->latest()->paginate(10)->withQueryString();

        $validCount   = $form->submissions()->where('is_archived', false)->where('is_spam', false)->count();
        $spamCount    = $form->submissions()->where('is_archived', false)->where('is_spam', true)->count();
        $archiveCount = $form->submissions()->where('is_archived', true)->count();

        $dailySubmissions = $form->submissions()
            ->where('is_archived', false)
            ->where('is_spam', false)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $lineLabels = [];
        $lineData   = [];
        for ($i = 6; $i >= 0; $i--) {
            $date         = now()->subDays($i)->format('Y-m-d');
            $lineLabels[] = now()->subDays($i)->format('M d');
            $lineData[]   = $dailySubmissions->firstWhere('date', $date)->count ?? 0;
        }

        $dailyArchived = $form->submissions()
            ->where('is_archived', true)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $archiveLineData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date              = now()->subDays($i)->format('Y-m-d');
            $archiveLineData[] = $dailyArchived->firstWhere('date', $date)->count ?? 0;
        }

        $validations = FormValidation::where('form_id', $form->id)->get();

        $permissions = [
            'can_edit_form'   => $this->canDo('edit_form'),
            'can_delete_form' => $this->canDo('delete_form'),
            'role'            => $this->getCurrentRole(),
        ];

        return view('dashboard.forms.show', compact(
            'form',
            'submissions',
            'validCount',
            'spamCount',
            'archiveCount',
            'lineLabels',
            'lineData',
            'archiveLineData',
            'tab',
            'search',
            'panel',
            'validations',
            'permissions'
        ));
    }

    /**
     * Show form settings.
     * FIX vs doc9: passes $projects to view so the project-move dropdown works.
     */
    public function editForm(string $id)
    {
        if (! $this->canDo('edit_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to edit forms in this workspace.');
        }

        $form = $this->workspaceForms()->findOrFail($id);

        // Projects needed for the "move to project" dropdown in the edit view
        $projects = Project::forUser($this->getActiveOwnerId())
            ->active()
            ->orderBy('name')
            ->get();

        return view('dashboard.forms.edit', compact('form', 'projects'));
    }

    /**
     * Update form.
     * FIX vs doc9: project_id included in validation + update array; redirect to project.
     */
    public function updateForm(Request $request, string $id)
    {
        if (! $this->canDo('edit_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to edit forms in this workspace.');
        }

        $form = $this->workspaceForms()->findOrFail($id);

        $request->validate([
            'name'                  => 'required|string|max:255',
            'recipient_email'       => 'required|email|max:255',
            'project_id'            => 'nullable|uuid|exists:projects,id',  // allows moving between projects
            'cc_emails'             => 'nullable|string|max:500',
            'redirect_url'          => 'nullable|url|max:500',
            'success_message'       => 'nullable|string|max:500',
            'status'                => 'required|in:active,paused',
            'honeypot_enabled'      => 'boolean',
            'email_notifications'   => 'boolean',
            'store_submissions'     => 'boolean',
            'auto_response_enabled' => 'boolean',
            'auto_response_message' => 'nullable|string',
        ]);

        $ccEmails = null;
        if ($request->filled('cc_emails')) {
            $ccEmails = array_map('trim', explode(',', $request->input('cc_emails')));
            $ccEmails = array_filter($ccEmails, fn($e) => filter_var($e, FILTER_VALIDATE_EMAIL));
            $ccEmails = array_values($ccEmails);
        }

        $autoResponseMessage = $request->input('auto_response_message');
        if ($autoResponseMessage) {
            $autoResponseMessage = str_replace('{form_name}', $request->input('name'), $autoResponseMessage);
        }

        $emailChanged = $form->recipient_email !== $request->input('recipient_email');

        // Resolve project_id: use submitted value, fall back to existing value on the form
        $newProjectId = $request->input('project_id') ?: $form->project_id;

        // If a project_id is present, verify it belongs to this workspace
        if ($newProjectId) {
            Project::where('id', $newProjectId)
                ->where('user_id', $this->getActiveOwnerId())
                ->firstOrFail();
        }

        $form->update([
            'name'                  => $request->input('name'),
            'recipient_email'       => $request->input('recipient_email'),
            'project_id'            => $newProjectId,           // ← persisted
            'cc_emails'             => $ccEmails,
            'redirect_url'          => $request->input('redirect_url'),
            'success_message'       => $request->input('success_message', 'Thank you for your submission!'),
            'status'                => $request->input('status'),
            'honeypot_enabled'      => $request->boolean('honeypot_enabled'),
            'email_notifications'   => $request->boolean('email_notifications'),
            'store_submissions'     => $request->boolean('store_submissions'),
            'auto_response_enabled' => $request->boolean('auto_response_enabled'),
            'auto_response_message' => $autoResponseMessage,
            'email_verified'        => $emailChanged ? false : $form->email_verified,
        ]);

        if ($emailChanged) {
            $form->update(['email_verification_token' => Str::random(64)]);
            $this->sendVerificationEmail($form);
            return redirect()->route('dashboard.forms.show', $form->id)
                ->with('message', 'Form updated! Please verify the new email address.');
        }

        // FIX vs doc9: redirect to project page if form belongs to one
        $redirect = $form->project_id
            ? route('dashboard.projects.show', $form->project_id)
            : route('dashboard.forms.show', $form->id);

        return redirect($redirect)->with('message', 'Form settings updated.');
    }

    /**
     * Delete form.
     * FIX vs doc9: redirects back to project page instead of always going to dashboard.
     */
    public function destroyForm(string $id)
    {
        if (! $this->canDo('delete_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'Only admins and owners can delete forms.');
        }

        $form      = $this->workspaceForms()->findOrFail($id);
        $projectId = $form->project_id;  // capture before delete
        $form->delete();

        // FIX vs doc9: go back to project if form belonged to one, else main dashboard
        $redirect = $projectId
            ? route('dashboard.projects.show', $projectId)
            : route('dashboard');

        return redirect($redirect)->with('message', 'Form deleted.');
    }

    // =========================================================================
    // SUBMISSIONS
    // =========================================================================

    /**
     * Show submission details.
     */
    public function showSubmission(string $formId, string $submissionId)
    {
        $form       = $this->workspaceForms()->findOrFail($formId);
        $submission = $form->submissions()->findOrFail($submissionId);

        if (!$submission->is_archived && !$submission->is_spam) {
            $submission->markAsRead();
        }

        return view('dashboard.submissions.show', compact('form', 'submission'));
    }

    /**
     * Delete submission.
     */
    public function destroySubmission(string $formId, string $submissionId)
    {
        if (! $this->canDo('edit_form')) {
            return redirect()->back()
                ->with('error', 'You do not have permission to delete submissions.');
        }

        $form       = $this->workspaceForms()->findOrFail($formId);
        $submission = $form->submissions()->findOrFail($submissionId);
        $submission->delete();

        return redirect()->route('dashboard.forms.show', $form->id)
            ->with('message', 'Submission deleted.');
    }

    /**
     * Mark submission as spam.
     */
    public function markAsSpam(string $formId, string $submissionId)
    {
        if (! $this->canDo('edit_form')) {
            return redirect()->back()
                ->with('error', 'You do not have permission to manage submissions.');
        }

        $form       = $this->workspaceForms()->findOrFail($formId);
        $submission = $form->submissions()->findOrFail($submissionId);
        $submission->markAsSpam('Marked by user');

        return back()->with('message', 'Submission marked as spam.');
    }

    // =========================================================================
    // CSV EXPORT
    // =========================================================================

    /**
     * Export submissions as CSV.
     * Uses OWNER's plan for csv_export check — not the team member's plan.
     */
    public function exportSubmissions(string $id)
    {
        $form  = $this->workspaceForms()->findOrFail($id);
        $owner = $this->getActiveOwner();

        if (! $owner->canUseFeature('csv_export')) {
            return back()->with('error', "CSV export is not available on this workspace's plan. The owner needs to upgrade.");
        }

        $submissions = $form->submissions()
            ->where('is_archived', false)
            ->where('is_spam', false)
            ->orderBy('created_at', 'desc')
            ->get();

        $fields = [];
        foreach ($submissions as $submission) {
            $fields = array_merge($fields, array_keys($submission->data));
        }
        $fields = array_unique($fields);

        $csv = fopen('php://temp', 'r+');
        fputcsv($csv, array_merge(['Submitted At', 'IP Address'], $fields));

        foreach ($submissions as $submission) {
            $row = [
                $submission->created_at->toDateTimeString(),
                $submission->ip_address,
            ];
            foreach ($fields as $field) {
                $value = $submission->data[$field] ?? '';
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }
                $row[] = $value;
            }
            fputcsv($csv, $row);
        }

        rewind($csv);
        $content = stream_get_contents($csv);
        fclose($csv);

        $filename = "{$form->name}_submissions_" . now()->format('Y-m-d') . '.csv';

        return response($content)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }

    // =========================================================================
    // EMAIL VERIFICATION
    // =========================================================================

    /**
     * Resend verification email.
     */
    public function resendVerification(string $id)
    {
        if (! $this->canDo('edit_form')) {
            return back()->with('error', 'You do not have permission to manage form settings.');
        }

        $form = $this->workspaceForms()->findOrFail($id);

        if ($form->email_verified) {
            return back()->with('message', 'Email is already verified.');
        }

        $form->update(['email_verification_token' => Str::random(64)]);
        $this->sendVerificationEmail($form);

        return back()->with('message', 'Verification email sent.');
    }

    /**
     * Send email verification mail to the form's recipient address.
     */
    protected function sendVerificationEmail(Form $form): void
    {
        Mail::to($form->recipient_email)->send(
            new \App\Mail\EmailVerificationMail($form)
        );
    }
}