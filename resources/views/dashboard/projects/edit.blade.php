{{-- resources/views/dashboard/projects/edit.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Edit ' . $project->name)

@section('content')
<style>
    @media (max-width: 480px) {
        .edit-project{
        display: block!important;
    
        }
        .card-edit{
            margin-bottom: 22px;
        }
    }
</style>
<div class="page-header">
    <div>
        <a href="{{ route('dashboard.projects.show', $project->id) }}" class="text-muted" style="font-size: 0.875rem;">
            ← Back to {{ $project->name }}
        </a>
        <h1 class="page-title">Project Settings</h1>
    </div>
</div>

<div class="edit-project" style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem; align-items: start;">

    {{-- Settings form --}}
    <div class="card card-edit">
        @if($errors->any())
            <div class="alert alert-error mb-3">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('dashboard.projects.update', $project->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Project Name <span style="color:var(--error)">*</span></label>
                <input type="text" id="name" name="name" class="form-input"
                       value="{{ old('name', $project->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description <span style="color:var(--text-muted)">optional</span></label>
                <input type="text" id="description" name="description" class="form-input"
                       value="{{ old('description', $project->description) }}"
                       placeholder="Short description">
            </div>

            <div class="form-group">
                <label class="form-label">Project Colour</label>
                <div style="display: flex; gap: 0.6rem; flex-wrap: wrap;">
                    @php
                        $palette = [
                            '#6366f1' => 'Indigo',
                            '#8b5cf6' => 'Violet',
                            '#ec4899' => 'Pink',
                            '#f59e0b' => 'Amber',
                            '#10b981' => 'Emerald',
                            '#3b82f6' => 'Blue',
                            '#ef4444' => 'Red',
                            '#64748b' => 'Slate',
                        ];
                        $selected = old('color', $project->color);
                    @endphp
                    @foreach($palette as $hex => $label)
                        <label style="cursor: pointer;">
                            <input type="radio" name="color" value="{{ $hex }}"
                                   {{ $selected === $hex ? 'checked' : '' }}
                                   style="display: none;" class="color-radio">
                            <span class="color-swatch"
                                  style="display: block; width: 28px; height: 28px; border-radius: 50%;
                                         background: {{ $hex }}; border: 3px solid transparent;
                                         transition: border-color 0.15s;"
                                  title="{{ $label }}"></span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-input" disabled>
                    <option value="active"   {{ $project->status === 'active'   ? 'selected' : '' }}>Active</option>
                    <option value="archived" {{ $project->status === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
                <input type="hidden" name="status" value="{{ $project->status }}">


            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('dashboard.projects.show', $project->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    {{-- Danger zone --}}
    <div class="card" style="border-color: rgba(255,68,68,0.3);">
        <h4 style="color: var(--error); margin-bottom: 1rem;">Danger Zone</h4>
        <p class="text-muted" style="font-size: 0.875rem; margin-bottom: 1rem;">
            Deleting this project will <strong>DELETE</strong> all forms inside it — and submissions will be lost.
        </p>
        <form id="delete-project-form" method="POST"
              action="{{ route('dashboard.projects.destroy', $project->id) }}">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-sm"
                onclick="if(confirm({{ json_encode('Delete project "' . $project->name . '"? This will delete the project and all forms inside it.') }})) document.getElementById('delete-project-form').submit();">
                Delete Project
            </button>
        </form>
        
    </div>
</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        function syncSwatches() {
            document.querySelectorAll('.color-radio').forEach(function (radio) {
                const swatch = radio.closest('label').querySelector('.color-swatch');
                swatch.style.borderColor = radio.checked ? radio.value : 'transparent';
                swatch.style.boxShadow   = radio.checked ? '0 0 0 2px var(--bg-primary)' : 'none';
            });
        }
        document.querySelectorAll('.color-radio').forEach(function (radio) {
            radio.addEventListener('change', syncSwatches);
            radio.closest('label').querySelector('.color-swatch').addEventListener('click', function () {
                radio.checked = true; syncSwatches();
            });
        });
        syncSwatches();
    });
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function syncSwatches() {
            document.querySelectorAll('.color-radio').forEach(function (radio) {
                const swatch = radio.closest('label').querySelector('.color-swatch');
                if (radio.checked) {
                    swatch.style.border = '3px solid white'; // fixed white border for selected
                    swatch.style.boxShadow = '0 0 0 2px var(--bg-primary)';
                } else {
                    swatch.style.border = '3px solid transparent'; // unselected
                    swatch.style.boxShadow = 'none';
                }
            });
        }

        document.querySelectorAll('.color-radio').forEach(function (radio) {
            radio.addEventListener('change', syncSwatches);
            radio.closest('label').querySelector('.color-swatch').addEventListener('click', function () {
                radio.checked = true; 
                syncSwatches();
            });
        });

        syncSwatches();
    });
</script>
@endsection