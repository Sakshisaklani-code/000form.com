{{-- resources/views/dashboard/projects/show.blade.php --}}
@extends('layouts.dashboard')

@section('title', $project->name)

@section('content')
<div class="page-header">
    <div>
        <a href="{{ route('dashboard') }}" class="text-muted" style="font-size: 0.875rem;">← Dashboard</a>
        <h1 class="page-title" style="display: flex; align-items: center; gap: 0.6rem;">
            <span style="display: inline-block; width: 12px; height: 12px;
                         border-radius: 50%; background: {{ $project->color }};"></span>
            {{ $project->name }}
        </h1>
        @if($project->description)
            <p class="text-muted" style="margin: 0; font-size: 0.875rem;">{{ $project->description }}</p>
        @endif
    </div>
    <div style="display: flex; gap: 0.5rem;">
        <a href="{{ route('dashboard.forms.create', ['project_id' => $project->id]) }}"
           class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Form
        </a>
        <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-secondary">
            Settings
        </a>
    </div>
</div>

{{-- Stats --}}
<div class="stats-grid" style="grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); margin-bottom: 2rem;">
    <div class="card stat-card">
        <div class="stat-label">Forms</div>
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

{{-- Forms list --}}
@if($forms->count() > 0)
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
                @foreach($forms as $form)
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
    <div class="card">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="empty-title">No forms in this project</h3>
            <p class="empty-description">Add your first form to start collecting submissions.</p>
            <a href="{{ route('dashboard.forms.create', ['project_id' => $project->id]) }}"
               class="btn btn-primary">Add First Form</a>
        </div>
    </div>
@endif
@endsection