<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Form;
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
            'view'         => in_array($role, ['owner', 'admin', 'editor', 'viewer']),
            'create_form'  => in_array($role, ['owner', 'admin', 'editor']),
            'edit_form'    => in_array($role, ['owner', 'admin', 'editor']),
            'delete_form'  => in_array($role, ['owner', 'admin']),
            'manage_team'  => in_array($role, ['owner', 'admin']),
            'billing'      => $role === 'owner',
            default        => false,
        };
    }

    /**
     * Get a Form query scoped to the active workspace owner.
     * ✅ Use this everywhere instead of Auth::user()->forms()
     */
    protected function workspaceForms()
    {
        return Form::where('user_id', $this->getActiveOwnerId());
    }

    // =========================================================================
    // DASHBOARD INDEX
    // =========================================================================

    /**
     * Show dashboard home.
     */
    public function index()
    {
        $user  = Auth::user();

        // ✅ was: $user->forms() — now scoped to active workspace owner
        $forms = $this->workspaceForms()
            ->withCount([
                'submissions as unread_count' => function ($query) {
                    $query->where('is_spam', false)
                          ->where('is_archived', false)
                          ->where('is_read', false);
                },
                'submissions as valid_count' => function ($query) {
                    $query->where('is_spam', false)
                          ->where('is_archived', false);
                },
                'submissions as spam_count' => function ($query) {
                    $query->where('is_spam', true)
                          ->where('is_archived', false);
                },
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_forms'       => $forms->count(),
            'total_submissions' => $forms->sum('submission_count'),
            'total_valid'       => $forms->sum('valid_count'),
            'total_spam'        => $forms->sum('spam_count'),
            'total_unread'      => $forms->sum('unread_count'),
            // ✅ was: $user->forms() — now scoped to active workspace owner
            'forms_this_month'  => $this->workspaceForms()
                ->where('created_at', '>=', now()->startOfMonth())
                ->count(),
        ];

        return view('dashboard.index', compact('forms', 'stats'));
    }

    // =========================================================================
    // CHART DATA
    // =========================================================================

    /**
     * Prepare chart data for forms created over time.
     * Signature unchanged — internally uses workspace scope now.
     */
    private function prepareChartData($user)
    {
        // ✅ was: $user->forms() — now scoped to active workspace owner
        $ownerId = $this->getActiveOwnerId();

        $formsGrouped = Form::where('user_id', $ownerId)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $chartData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date    = now()->subDays($i);
            $dateKey = $date->format('Y-m-d');

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
     */
    public function createForm()
    {
        // ✅ Viewers cannot create forms
        if (! $this->canDo('create_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create forms in this workspace.');
        }

        return view('dashboard.forms.create');
    }

    /**
     * Store new form.
     */
    public function storeForm(Request $request)
    {
        // ✅ Viewers cannot create forms
        if (! $this->canDo('create_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create forms in this workspace.');
        }

        $request->validate([
            'name'                  => 'required|string|max:255',
            'recipient_email'       => 'required|email|max:255',
            'cc_emails'             => 'nullable|string|max:500',
            'redirect_url'          => 'nullable|url|max:500',
            'success_message'       => 'nullable|string|max:500',
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

        // ✅ was: Auth::user()->forms()->create()
        // Form is always created under the WORKSPACE OWNER's account.
        // When team member creates a form → owned by the workspace owner.
        // When in own workspace → getActiveOwner() returns Auth::user(), no change.
        $owner = $this->getActiveOwner();

        $form = $owner->forms()->create([
            'name'                  => $request->input('name'),
            'recipient_email'       => $request->input('recipient_email'),
            'cc_emails'             => $ccEmails,
            'redirect_url'          => $request->input('redirect_url'),
            'success_message'       => $request->input('success_message', 'Thank you for your submission!'),
            'auto_response_enabled' => $request->boolean('auto_response_enabled'),
            'auto_response_message' => $autoResponseMessage,
            'email_notifications'   => true,
            'store_submissions'     => true,
            'honeypot_enabled'      => true,
            'status'                => 'active',
            'archive_when_paused'   => true,
        ]);

        $this->sendVerificationEmail($form);

        return redirect()->route('dashboard.forms.show', $form->id)
            ->with('message', 'Form created! Please verify the recipient email address.');
    }

    /**
     * Show form details with filtered/tabbed submissions.
     */
    public function showForm(string $id)
    {
        // ✅ was: Auth::user()->forms()->findOrFail($id)
        // Scoped to workspace — prevents team members accessing other workspace forms
        $form   = $this->workspaceForms()->findOrFail($id);
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
                $q->whereRaw("LOWER(data->>'name')    LIKE ?", [$lower])
                ->orWhereRaw("LOWER(data->>'email')   LIKE ?", [$lower])
                ->orWhereRaw("LOWER(data->>'message') LIKE ?", [$lower])
                ->orWhereRaw("LOWER(data->>'phone')   LIKE ?", [$lower])
                ->orWhereRaw("LOWER(data::text) LIKE ?",       [$lower]);
            });
        }

        $submissions = $baseQuery->latest()->paginate(10)->withQueryString();

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

        // ✅ NEW: pass permissions to view so blade can show/hide edit/delete buttons
        $permissions = [
            'can_edit_form'   => $this->canDo('edit_form'),
            'can_delete_form' => $this->canDo('delete_form'),
            'role'            => $this->getCurrentRole(),
        ];

        return view('dashboard.forms.show', compact(
            'form', 'submissions', 'validCount', 'spamCount', 'archiveCount',
            'lineLabels', 'lineData', 'archiveLineData',
            'tab', 'search', 'panel',
            'validations',
            'permissions'
        ));
    }

    /**
     * Show form settings.
     */
    public function editForm(string $id)
    {
        // ✅ Viewers cannot edit
        if (! $this->canDo('edit_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to edit forms in this workspace.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($id)
        $form = $this->workspaceForms()->findOrFail($id);
        return view('dashboard.forms.edit', compact('form'));
    }

    /**
     * Update form.
     */
    public function updateForm(Request $request, string $id)
    {
        // ✅ Viewers cannot edit
        if (! $this->canDo('edit_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to edit forms in this workspace.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($id)
        $form = $this->workspaceForms()->findOrFail($id);

        $request->validate([
            'name'                  => 'required|string|max:255',
            'recipient_email'       => 'required|email|max:255',
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

        $form->update([
            'name'                  => $request->input('name'),
            'recipient_email'       => $request->input('recipient_email'),
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

        return redirect()->route('dashboard.forms.show', $form->id)
            ->with('message', 'Form settings updated.');
    }

    /**
     * Delete form.
     */
    public function destroyForm(string $id)
    {
        // ✅ Only owner and admin can delete
        if (! $this->canDo('delete_form')) {
            return redirect()->route('dashboard')
                ->with('error', 'Only admins and owners can delete forms.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($id)
        $form = $this->workspaceForms()->findOrFail($id);
        $form->delete();

        return redirect()->route('dashboard')->with('message', 'Form deleted.');
    }

    // =========================================================================
    // SUBMISSIONS
    // =========================================================================

    /**
     * Show submission details.
     */
    public function showSubmission(string $formId, string $submissionId)
    {
        // ✅ was: Auth::user()->forms()->findOrFail($formId)
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
        // ✅ Viewers cannot delete submissions
        if (! $this->canDo('edit_form')) {
            return redirect()->back()
                ->with('error', 'You do not have permission to delete submissions.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($formId)
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
        // ✅ Viewers cannot mark spam
        if (! $this->canDo('edit_form')) {
            return redirect()->back()
                ->with('error', 'You do not have permission to manage submissions.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($formId)
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
     * ✅ Uses OWNER's plan for csv_export check — not the team member's plan.
     */
    public function exportSubmissions(string $id)
    {
        // ✅ was: Auth::user()->forms()->findOrFail($id)
        $form = $this->workspaceForms()->findOrFail($id);

        // ✅ Check owner's plan, not logged-in team member's plan
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
        // ✅ Viewers cannot manage form settings
        if (! $this->canDo('edit_form')) {
            return back()->with('error', 'You do not have permission to manage form settings.');
        }

        // ✅ was: Auth::user()->forms()->findOrFail($id)
        $form = $this->workspaceForms()->findOrFail($id);

        if ($form->email_verified) {
            return back()->with('message', 'Email is already verified.');
        }

        $form->update(['email_verification_token' => Str::random(64)]);
        $this->sendVerificationEmail($form);

        return back()->with('message', 'Verification email sent.');
    }

    /**
     * Send email verification.
     * Unchanged — no workspace logic needed here.
     */
    protected function sendVerificationEmail(Form $form): void
    {
        Mail::to($form->recipient_email)->send(
            new \App\Mail\EmailVerificationMail($form)
        );
    }
}