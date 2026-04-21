{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<style>
/* ── Mobile-first responsive fixes ───────────────────────── */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}
@media (min-width: 480px) {
    .stats-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (min-width: 900px) {
    .stats-grid { grid-template-columns: repeat(6, 1fr); }
}

.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}

.stat-card .stat-value {
    font-size: clamp(1.2rem, 4vw, 1.8rem);
}
.stat-card .stat-label {
    font-size: clamp(0.7rem, 2.5vw, 0.85rem);
}

.project-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid var(--border-color);
    background: var(--bg-secondary);
    flex-wrap: wrap;
    gap: 0.75rem;
}
@media (min-width: 640px) {
    .project-header {
        align-items: center;
        padding: 1.1rem 1.5rem;
    }
}

.project-header-left {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
    min-width: 0;
}

.project-header-right {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.4rem;
    flex-shrink: 0;
}

.project-name {
    font-weight: 600;
    font-size: 1rem;
    color: var(--text);
    text-decoration: none;
    word-break: break-word;
}

/* .table-wrapper scroll fix is handled globally in app.css */

.standalone-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

/* ── Search toolbar ───────────────────────────────────────── */
.search-toolbar {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    margin-bottom: 1.25rem;
}

.search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
    max-width: 360px;
}

.search-wrap .search-icon {
    position: absolute;
    left: 0.65rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    pointer-events: none;
    display: flex;
    align-items: center;
}

.search-input {
    width: 100%;
    padding: 0.7rem 2.2rem;
    border: 1px solid white;
    border-radius: 3rem;
    background: var(--bg);
    color: var(--text);
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.15s;
}

.search-input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent) 12%, transparent);
}

.search-input::placeholder {
    color: var(--text-muted);
}

.search-clear {
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: var(--text-muted);
    display: none;
    padding: 2px;
    line-height: 1;
    border-radius: 3px;
}

.search-clear:hover {
    color: var(--text);
    background: var(--bg-secondary);
}

.search-result-count {
    font-size: 1rem;
    color: #00ff88;
    white-space: nowrap;
}

/* ── No-results state ─────────────────────────────────────── */
.no-results-state {
    display: none;
    padding: 3rem 1.5rem;
    text-align: center;
    color: var(--text-muted);
    font-size: 1.2rem;
    border: 1px dashed var(--border-color);
    border-radius: 8px;
    margin-bottom: 1.5rem;
}

.no-results-state svg {
    display: block;
    margin: 0 auto 0.75rem;
    opacity: 0.35;
}

.no-results-state strong {
    color: var(--text);
}

/* ── Search highlight ─────────────────────────────────────── */
mark.search-hl {
    background: color-mix(in srgb, var(--accent) 22%, transparent);
    color: inherit;
    border-radius: 2px;
    padding: 0 1px;
}

/* ── Row / card hiding during search ─────────────────────── */
.project-card-wrap.search-hidden {
    display: none;
}

tr.form-row-hidden {
    display: none;
}
</style>

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

{{-- ── Search toolbar (shown when there's anything to search) ────────────── --}}
@if($projects->count() > 0 || $standaloneForms->count() > 0)
<div class="search-toolbar">
    <div class="search-wrap">
        <span class="search-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
        </span>
        <input
            type="text"
            id="projectSearch"
            class="search-input"
            placeholder="Search projects or forms…"
            autocomplete="off"
            aria-label="Search projects and forms"
        >
        <button class="search-clear" id="searchClear" title="Clear search" aria-label="Clear search">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <span class="search-result-count" id="searchResultCount" aria-live="polite"></span>
</div>
@endif

{{-- ── Global no-results empty state ─────────────────────────────────────── --}}
<div class="no-results-state" id="noResultsState" role="status">
    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
    </svg>
    No projects or forms match "<strong id="noResultsTerm"></strong>"
</div>

{{-- ── Projects ────────────────────────────────────────────────────────────── --}}
@if($projects->count() > 0)
    <div id="projectsList" style="display: flex; flex-direction: column; gap: 1.5rem; margin-bottom: 2rem;">
        @foreach($projects as $project)
            {{--
                data-project-name: lowercased project name + description for header-level matching.
                When the project name matches → all its form rows stay visible.
                When only a form row matches → card stays visible but other rows hide.
            --}}
            <div
                class="project-card-wrap card"
                style="padding: 0; overflow: hidden;"
                data-project-name="{{ strtolower($project->name . ' ' . $project->description) }}"
            >
                {{-- Project Header --}}
                <div class="project-header">
                    <div class="project-header-left">
                        <span style="display: inline-block; width: 10px; height: 10px;
                                     border-radius: 50%; background: {{ $project->color }};
                                     flex-shrink: 0;"></span>
                        <a href="{{ route('dashboard.projects.show', $project->id) }}" class="project-name" data-label="{{ $project->name }}">
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
                    <div class="project-header-right">
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
                    <div class="table-wrapper">
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
                                    {{-- data-search: haystack for this specific form row --}}
                                    <tr data-search="{{ strtolower($form->name . ' ' . $form->slug . ' ' . $form->status) }}">
                                        <td>
                                            <a href="{{ route('dashboard.forms.show', $form->id) }}" class="table-link" data-label="{{ $form->name }}">
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
    <div class="card" style="overflow: hidden;">
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
@if($standaloneForms->count() > 0)
    <div id="standaloneSection" style="margin-top: 2rem;">
        <div class="standalone-header">
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
                <tbody id="standaloneBody">
                    @foreach($standaloneForms as $form)
                        <tr data-search="{{ strtolower($form->name . ' ' . $form->slug . ' ' . $form->status) }}">
                            <td>
                                <a href="{{ route('dashboard.forms.show', $form->id) }}" class="table-link" data-label="{{ $form->name }}">
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

{{-- ── Search JS ───────────────────────────────────────────────────────────── --}}
@if($projects->count() > 0 || $standaloneForms->count() > 0)
<script>
    (function () {
        const input          = document.getElementById('projectSearch');
        const clearBtn       = document.getElementById('searchClear');
        const countEl        = document.getElementById('searchResultCount');
        const noResults      = document.getElementById('noResultsState');
        const noResultsTerm  = document.getElementById('noResultsTerm');
        const standalone     = document.getElementById('standaloneSection');

        const projectCards   = Array.from(document.querySelectorAll('#projectsList .project-card-wrap'));
        const standaloneRows = standalone
            ? Array.from(standalone.querySelectorAll('#standaloneBody tr[data-search]'))
            : [];

        function escRe(s) {
            return s.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }

        /* Re-render [data-label] text with or without <mark> highlights */
        function applyHighlight(container, re) {
            if (!container) return;
            container.querySelectorAll('[data-label]').forEach(function (node) {
                const orig = node.getAttribute('data-label');
                node.innerHTML = re
                    ? orig.replace(re, '<mark class="search-hl">$&</mark>')
                    : orig;
            });
        }

        function doSearch() {
            const raw  = input.value.trim();
            const term = raw.toLowerCase();
            const re   = term ? new RegExp(escRe(term), 'gi') : null;

            clearBtn.style.display = term ? 'block' : 'none';

            let visibleProjects   = 0;
            let visibleStandalone = 0;

            /* ── Project cards ────────────────────────────────────────────────── */
            projectCards.forEach(function (card) {
                const projectHaystack = card.getAttribute('data-project-name') || '';
                const projectMatch    = !term || projectHaystack.includes(term);

                const formRows  = Array.from(card.querySelectorAll('tbody tr[data-search]'));
                let rowsVisible = 0;

                formRows.forEach(function (row) {
                    /*
                    * A row is visible when:
                    *   • no search term (show everything), OR
                    *   • the project name itself matches (show all its forms), OR
                    *   • the form row's own haystack matches
                    */
                    const rowMatch = !term || projectMatch || row.getAttribute('data-search').includes(term);
                    row.classList.toggle('form-row-hidden', !rowMatch);

                    if (rowMatch) {
                        rowsVisible++;
                        applyHighlight(row, re);
                    } else {
                        applyHighlight(row, null);
                    }
                });

                /* Card stays visible if project matches OR at least one form row matches */
                const cardVisible = !term || projectMatch || rowsVisible > 0;
                card.classList.toggle('search-hidden', !cardVisible);

                if (cardVisible) {
                    visibleProjects++;
                    applyHighlight(card.querySelector('.project-header'), re);
                } else {
                    applyHighlight(card.querySelector('.project-header'), null);
                }
            });

            /* ── Standalone form rows ─────────────────────────────────────────── */
            standaloneRows.forEach(function (row) {
                const rowMatch = !term || row.getAttribute('data-search').includes(term);
                row.classList.toggle('form-row-hidden', !rowMatch);

                if (rowMatch) {
                    visibleStandalone++;
                    applyHighlight(row, re);
                } else {
                    applyHighlight(row, null);
                }
            });

            /* Show/hide the standalone section wrapper */
            if (standalone) {
                standalone.style.display = (!term || visibleStandalone > 0) ? '' : 'none';
            }

            /* ── Result count label ───────────────────────────────────────────── */
            if (term) {
                const parts = [];
                if (visibleProjects > 0)
                    parts.push(visibleProjects + ' result' + (visibleProjects !== 1 ? 's' : ''));
                if (visibleStandalone > 0)
                    parts.push(visibleStandalone + ' standalone form' + (visibleStandalone !== 1 ? 's' : ''));

                countEl.textContent       = parts.length ? parts.join(', ') + ' found' : '';
                noResults.style.display   = (visibleProjects + visibleStandalone) === 0 ? 'block' : 'none';
                noResultsTerm.textContent = raw;
            } else {
                countEl.textContent     = '';
                noResults.style.display = 'none';
            }
        }

        input.addEventListener('input', doSearch);

        clearBtn.addEventListener('click', function () {
            input.value = '';
            doSearch();
            input.focus();
        });
    })();
</script>
@endif

@endsection