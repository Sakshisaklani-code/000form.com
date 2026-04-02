{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        New Project
    </a>
</div>

{{-- ── Stats ──────────────────────────────────────────────────────────────── --}}
<div class="stats-grid">
    <div class="card stat-card">
        <div class="stat-label">Projects</div>
        <div class="stat-value">{{ $stats['total_projects'] }}</div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Total Forms</div>
        <div class="stat-value">{{ $stats['total_forms'] }}</div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Total Submissions</div>
        <div class="stat-value">{{ number_format($stats['total_submissions']) }}</div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Valid</div>
        <div class="stat-value" style="color: var(--accent);">{{ number_format($stats['total_valid']) }}</div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Spam Blocked</div>
        <div class="stat-value" style="color: #ff6b6b;">{{ number_format($stats['total_spam']) }}</div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Unread</div>
        <div class="stat-value accent">{{ $stats['total_unread'] }}</div>
    </div>
</div>

{{-- ── Projects ────────────────────────────────────────────────────────────── --}}
@if($projects->count() > 0)
    <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 2rem;">
        @foreach($projects as $project)
            <div class="card" style="padding: 0; overflow: hidden;">

                {{-- Project Header --}}
                <div style="display: flex; align-items: center; justify-content: space-between;
                            padding: 1.1rem 1.5rem; border-bottom: 1px solid var(--border-color);
                            background: var(--bg-secondary);">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        {{-- Color dot --}}
                        <span style="display: inline-block; width: 10px; height: 10px;
                                     border-radius: 50%; background: {{ $project->color }};
                                     flex-shrink: 0;"></span>
                        <a href="{{ route('dashboard.projects.show', $project->id) }}"
                           style="font-weight: 600; font-size: 1rem; color: var(--text); text-decoration: none;">
                            {{ $project->name }}
                        </a>
                        @if($project->description)
                            <span style="font-size: 0.8rem; color: var(--text-muted);">— {{ $project->description }}</span>
                        @endif
                        @php $projectUnread = $project->forms->sum('unread_count'); @endphp
                        @if($projectUnread > 0)
                            <span class="badge badge-success">{{ $projectUnread }} new</span>
                        @endif
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="font-size: 0.8rem; color: var(--text-muted);">
                            {{ $project->forms->count() }} {{ Str::plural('form', $project->forms->count()) }}
                        </span>
                        <a href="{{ route('dashboard.forms.create', ['project_id' => $project->id]) }}"
                           class="btn btn-ghost btn-sm">
                            + Add Form
                        </a>
                        <a href="{{ route('dashboard.projects.show', $project->id) }}"
                           class="btn btn-ghost btn-sm">View</a>
                        <a href="{{ route('dashboard.projects.edit', $project->id) }}"
                           class="btn btn-ghost btn-sm">Settings</a>
                    </div>
                </div>

                {{-- Forms inside project --}}
                @if($project->forms->count() > 0)
                    <div class="table-wrapper" style="margin: 0; border: none; border-radius: 0;">
                        <table class="table" style="margin: 0;">
                            <thead>
                                <tr>
                                    <th>Form Name</th>
                                    <th>Endpoint</th>
                                    <th>Total</th>
                                    <th>Valid</th>
                                    <th>Spam</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->forms as $form)
                                    <tr>
                                        <td>
                                            <a href="{{ route('dashboard.forms.show', $form->id) }}" class="table-link">
                                                {{ $form->name }}
                                            </a>
                                            @if($form->unread_count > 0)
                                                <span class="badge badge-success" style="margin-left: 0.5rem;">
                                                    {{ $form->unread_count }} new
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <code class="mono" style="font-size: 0.85rem; color: var(--text-muted);">
                                                /f/{{ $form->slug }}
                                            </code>
                                        </td>
                                        <td>{{ number_format($form->submission_count) }}</td>
                                        <td style="color: var(--accent);">{{ number_format($form->valid_count) }}</td>
                                        <td style="color: #ff6b6b;">{{ number_format($form->spam_count) }}</td>
                                        <td>
                                            @if(!$form->email_verified)
                                                <span class="badge badge-warning">
                                                    <span class="badge-dot"></span>Pending Verification
                                                </span>
                                            @elseif($form->status === 'active')
                                                <span class="badge badge-success">
                                                    <span class="badge-dot"></span>Active
                                                </span>
                                            @else
                                                <span class="badge badge-warning">
                                                    <span class="badge-dot"></span>Paused
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('dashboard.forms.show', $form->id) }}"
                                               class="btn btn-ghost btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="padding: 2rem 1.5rem; text-align: center; color: var(--text-muted); font-size: 0.9rem;">
                        No forms yet in this project.
                        <a href="{{ route('dashboard.forms.create', ['project_id' => $project->id]) }}"
                           style="color: var(--accent); margin-left: 0.25rem;">Add your first form →</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endif

{{-- ── Empty state (no projects AND no standalone forms) ─────────────────── --}}
@if($projects->count() === 0 && $standaloneForms->count() === 0)
    <div class="card">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/>
            </svg>
            <h3 class="empty-title">No projects yet</h3>
            <p class="empty-description">Create a project to organise your form endpoints.</p>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                Create Your First Project
            </a>
        </div>
    </div>
@endif

{{-- ── Standalone / legacy forms ───────────────────────────────────────────── --}}
{{-- These are forms created before the project feature was introduced.         --}}
{{-- They remain fully functional; users just can't create new standalone forms. --}}
@if($standaloneForms->count() > 0)
    <div style="margin-top: 2rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
            <h2 style="font-size: 1rem; font-weight: 600; color: var(--text-secondary); margin: 0;">
                Standalone Forms
            </h2>
            <span style="font-size: 0.75rem; color: var(--text-muted);
                         background: var(--bg-tertiary); padding: 0.2rem 0.6rem;
                         border-radius: 999px; border: 1px solid var(--border-color);">
                legacy — created before projects
            </span>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Endpoint</th>
                        <th>Total</th>
                        <th>Valid</th>
                        <th>Spam</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standaloneForms as $form)
                        <tr>
                            <td>
                                <a href="{{ route('dashboard.forms.show', $form->id) }}" class="table-link">
                                    {{ $form->name }}
                                </a>
                                @if($form->unread_count > 0)
                                    <span class="badge badge-success" style="margin-left: 0.5rem;">
                                        {{ $form->unread_count }} new
                                    </span>
                                @endif
                            </td>
                            <td>
                                <code class="mono" style="font-size: 0.85rem; color: var(--text-muted);">
                                    /f/{{ $form->slug }}
                                </code>
                            </td>
                            <td>{{ number_format($form->submission_count) }}</td>
                            <td style="color: var(--accent);">{{ number_format($form->valid_count) }}</td>
                            <td style="color: #ff6b6b;">{{ number_format($form->spam_count) }}</td>
                            <td>
                                @if(!$form->email_verified)
                                    <span class="badge badge-warning">
                                        <span class="badge-dot"></span>Pending Verification
                                    </span>
                                @elseif($form->status === 'active')
                                    <span class="badge badge-success">
                                        <span class="badge-dot"></span>Active
                                    </span>
                                @else
                                    <span class="badge badge-warning">
                                        <span class="badge-dot"></span>Paused
                                    </span>
                                @endif
                            </td>
                            <td class="text-right">
                                <a href="{{ route('dashboard.forms.show', $form->id) }}"
                                   class="btn btn-ghost btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

@endsection