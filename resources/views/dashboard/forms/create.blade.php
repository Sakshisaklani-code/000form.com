{{-- resources/views/dashboard/forms/create.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Create Form')

@section('content')
<div class="page-header">
    <div>
        @if(isset($selectedProject) && $selectedProject)
            <a href="{{ route('dashboard.projects.show', $selectedProject->id) }}"
               class="text-muted" style="font-size: 0.875rem;">
                ← Back to {{ $selectedProject->name }}
            </a>
        @else
            <a href="{{ route('dashboard') }}" class="text-muted" style="font-size: 0.875rem;">← Dashboard</a>
        @endif
        <h1 class="page-title">Create New Form</h1>
    </div>
</div>

<div class="card" style="max-width: 620px;">
    @if($errors->any())
        <div class="alert alert-error mb-3">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('dashboard.forms.store') }}">
        @csrf

        {{-- ── Project selector ──────────────────────────────────────────── --}}
        <div class="form-group">
            <label for="project_id" class="form-label">Project <span style="color:var(--error)">*</span></label>
            <select id="project_id" class="form-input" disabled>
                <option value="">— Select a project —</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ old('project_id', $selectedProject?->id) === $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            <input type="hidden" name="project_id" value="{{ old('project_id', $selectedProject?->id) }}">

            <p class="form-help">
                Forms must belong to a project.
            </p>
        </div>

        {{-- ── Form name ─────────────────────────────────────────────────── --}}
        <div class="form-group">
            <label for="name" class="form-label">Form Name <span style="color:var(--error)">*</span></label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-input"
                value="{{ old('name') }}"
                placeholder="e.g., Contact Form, Newsletter Signup"
                required
            >
            <p class="form-help">A friendly name to identify this form in your dashboard.</p>
        </div>

        {{-- ── Recipient email ───────────────────────────────────────────── --}}
        <div class="form-group">
            <label for="recipient_email" class="form-label">Recipient Email <span style="color:var(--error)">*</span></label>
            <input
                type="email"
                id="recipient_email"
                name="recipient_email"
                class="form-input"
                value="{{ old('recipient_email', auth()->user()->email) }}"
                placeholder="you@example.com"
                required readonly
            >
            <p class="form-help">Form submissions will be sent to this email address.</p>
        </div>

        {{-- ── Auto-response ─────────────────────────────────────────────── --}}
        <label for="auto_response_enabled" class="form-label">Auto-Response Settings</label>

        <div class="form-group">
            <label class="form-checkbox" style="display: flex; align-items: center;">
                <input type="checkbox" name="auto_response_enabled" value="1"
                       {{ old('auto_response_enabled') ? 'checked' : '' }}>
                <span style="font-weight: 300;">Enable auto-response email</span>
            </label>
            <p class="form-help">
                Send an automatic thank-you email to users who submit this form.
                The email will be sent from {{ config('mail.from.address') }}
            </p>
        </div>

        <div id="autoResponseFields" style="display: {{ old('auto_response_enabled') ? 'block' : 'none' }};">
            <div class="form-group">
                <label for="auto_response_message" class="form-label">Auto-Response Message</label>
                <textarea
                    id="auto_response_message"
                    name="auto_response_message"
                    class="form-input"
                    rows="6"
                    placeholder="Write your thank you message here..."
                >{{ old('auto_response_message', "Dear {visitor_name},\n\nThank you for contacting us! We have received your message via {form_name} and will get back to you shortly.\n\nBest regards,\nThe {site_name} Team") }}</textarea>
            </div>
        </div>

        {{-- ── Redirect URL ──────────────────────────────────────────────── --}}
        <div class="form-group">
            <label for="redirect_url" class="form-label">Redirect URL <span style="color:var(--text-muted)">optional</span></label>
            <input
                type="url"
                id="redirect_url"
                name="redirect_url"
                class="form-input"
                value="{{ old('redirect_url') }}"
                placeholder="https://yoursite.com/thank-you"
            >
            <p class="form-help">Where to redirect users after submission. Leave empty to show our default thank-you page.</p>
        </div>

        {{-- ── Success message ───────────────────────────────────────────── --}}
        <div class="form-group">
            <label for="success_message" class="form-label">Success Message <span style="color:var(--text-muted)">optional</span></label>
            <input
                type="text"
                id="success_message"
                name="success_message"
                class="form-input"
                value="{{ old('success_message', 'Thank you for your submission!') }}"
                placeholder="Thank you for your submission!"
            >
            <p class="form-help">Shown on our thank-you page or returned in JSON response.</p>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Form</button>
            @if(isset($selectedProject) && $selectedProject)
                <a href="{{ route('dashboard.projects.show', $selectedProject->id) }}" class="btn btn-secondary">Cancel</a>
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
            @endif
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const autoResponseCheckbox = document.querySelector('input[name="auto_response_enabled"]');
    const autoResponseFields   = document.getElementById('autoResponseFields');
    const nameInput            = document.getElementById('name');
    const autoResponseTextarea = document.getElementById('auto_response_message');

    function toggleAutoResponseFields() {
        autoResponseFields.style.display = autoResponseCheckbox.checked ? 'block' : 'none';
    }

    function syncFormName() {
        const formName = nameInput.value.trim() || 'our form';
        if (!autoResponseTextarea.dataset.manuallyEdited) {
            autoResponseTextarea.value =
                "Dear {visitor_name},\n\n" +
                "Thank you for contacting us! We have received your message via " + formName +
                " and will get back to you shortly.\n\nBest regards,\nThe {site_name} Team";
        }
    }

    autoResponseTextarea.addEventListener('input', function () {
        this.dataset.manuallyEdited = 'true';
    });

    nameInput.addEventListener('input', syncFormName);
    autoResponseCheckbox.addEventListener('change', toggleAutoResponseFields);

    toggleAutoResponseFields();
    syncFormName();
});
</script>
@endsection