<?php
// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // =========================================================================
    // HELPERS (mirrors DashboardController workspace helpers)
    // =========================================================================

    protected function getActiveOwnerId(): string
    {
        return session('active_workspace', Auth::id());
    }

    protected function workspaceProjects()
    {
        return Project::forUser($this->getActiveOwnerId());
    }

    // =========================================================================
    // INDEX — redirect to dashboard (projects live there)
    // =========================================================================

    public function index()
    {
        return redirect()->route('dashboard');
    }

    // =========================================================================
    // CREATE
    // =========================================================================

    public function create()
    {
        // Permission check: only owner/admin can create projects
        if (! $this->canDo('create_project')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create a project in this workspace.');
        }

        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        // Permission check
        if (! $this->canDo('create_project')) {
            return redirect()->route('dashboard')
                ->with('error', 'You do not have permission to create a project in this workspace.');
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|size:7|regex:/^#[0-9a-fA-F]{6}$/',
        ]);

        $project = Project::create([
            'user_id'     => $this->getActiveOwnerId(),
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'color'       => $validated['color'] ?? '#6366f1',
            'status'      => 'active',
        ]);

        return redirect()
            ->route('dashboard.projects.show', $project->id)
            ->with('message', "Project \"{$project->name}\" created. Now add your first form.");
    }

    // =========================================================================
    // SHOW — project detail with its forms and submissions summary
    // =========================================================================

    public function show(string $id)
    {
        $project = $this->workspaceProjects()->findOrFail($id);

        $forms = Form::where('project_id', $project->id)
            ->withCount([
                'submissions as unread_count' => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false)
                    ->where('is_read', false),
                'submissions as valid_count' => fn($q) => $q->where('is_spam', false)
                    ->where('is_archived', false),
                'submissions as spam_count' => fn($q) => $q->where('is_spam', true)
                    ->where('is_archived', false),
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_forms'       => $forms->count(),
            'total_submissions' => $forms->sum('submission_count'),
            'total_valid'       => $forms->sum('valid_count'),
            'total_spam'        => $forms->sum('spam_count'),
            'total_unread'      => $forms->sum('unread_count'),
        ];

        return view('dashboard.projects.show', compact('project', 'forms', 'stats'));
    }

    // =========================================================================
    // EDIT / UPDATE
    // =========================================================================

    public function edit(string $id)
    {
        $project = $this->workspaceProjects()->findOrFail($id);
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $project = $this->workspaceProjects()->findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|size:7|regex:/^#[0-9a-fA-F]{6}$/',
            'status'      => 'required|in:active,archived',
        ]);

        $project->update($validated);

        return redirect()
            ->route('dashboard.projects.show', $project->id)
            ->with('message', 'Project updated.');
    }

    // =========================================================================
    // DELETE
    // =========================================================================

    public function destroy(string $id)
    {
        $project = $this->workspaceProjects()->findOrFail($id);

        // Detach forms from project (make them standalone) rather than deleting
        Form::where('project_id', $project->id)
            ->update(['project_id' => null]);

        $project->delete();

        return redirect()
            ->route('dashboard')
            ->with('message', "Project \"{$project->name}\" deleted. Its forms have been kept and moved to standalone.");
    }

    // =========================================================================
    // WORKSPACE PERMISSION CHECK
    // =========================================================================

    protected function canDo(string $action): bool
    {
        $role = session('workspace_role', 'viewer'); // default to viewer

        return match ($action) {
            'view'           => in_array($role, ['owner', 'admin', 'editor', 'viewer']),
            'create_project' => in_array($role, ['owner', 'admin']),
            'create_form'    => in_array($role, ['owner', 'admin', 'editor']),
            'edit_form'      => in_array($role, ['owner', 'admin', 'editor']),
            'delete_form'    => in_array($role, ['owner', 'admin']),
            'manage_team'    => in_array($role, ['owner', 'admin']),
            'billing'        => $role === 'owner',
            default          => false,
        };
    }
}