@extends('layouts.app')

@section('title', 'Validation Error - 000form')

@section('content')

<div class="auth-page">
    <div class="auth-container text-center">


    <div style="width: 80px; height: 80px; background: rgba(255, 68, 68, 0.15); border-radius: 50%; margin: 0 auto 2rem; display: flex; align-items: center; justify-content: center;">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--error)" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <line x1="15" y1="9" x2="9" y2="15"/>
            <line x1="9" y1="9" x2="15" y2="15"/>
        </svg>
    </div>

    <h1 style="font-size: 2rem; margin-bottom: 1rem;">Validation Error</h1>

    <p class="text-muted" style="margin-bottom: 2rem;">
        Your submission failed one or more validation rules. Please correct the errors and try again.
    </p>

    <div style="text-align:left; margin-bottom:2rem;">
        <strong>These fields had errors:</strong>

        <ul style="margin-top:1rem;">
            @foreach ($errors as $error)
                <li style="margin-bottom:0.5rem;">
                    <strong>{{ $error['field'] }}</strong> — {{ $error['message'] }}
                </li>
            @endforeach
        </ul>
    </div>

    <button onclick="history.back()" class="btn btn-primary">
        Go Back
    </button>

</div>


</div>
@endsection
