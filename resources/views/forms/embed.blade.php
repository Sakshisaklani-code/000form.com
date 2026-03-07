@extends('layouts.app')

@section('title', 'Embed Popup — ' . $form->name)

@section('content')
<div style="max-width:700px; margin:0 auto; padding:3rem 1.5rem;">

  <h1 style="font-family:'Syne',sans-serif; font-size:1.75rem; font-weight:800; margin-bottom:.5rem;">
    Popup Embed
  </h1>
  <p style="color:var(--text-muted); margin-bottom:2.5rem;">
    Add this single line to any website to show a floating contact button powered by
    <strong>{{ $form->name }}</strong>.
  </p>

  @if(session('success'))
    <div style="background:rgba(34,197,94,.1); border:1px solid rgba(34,197,94,.25); color:#16a34a;
                border-radius:8px; padding:.875rem 1.25rem; margin-bottom:1.5rem; font-size:.875rem;">
      {{ session('success') }}
    </div>
  @endif

  {{-- SNIPPET CARD --}}
  <div class="card" style="margin-bottom:2rem;">
    <label style="font-size:.7rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase;
                  color:var(--text-muted); display:block; margin-bottom:.75rem;">
      Your embed snippet
    </label>

    <div style="position:relative;">
      <pre id="snippet-code"
           style="background:var(--bg-secondary); border:1px solid var(--border-color);
                  border-radius:8px; padding:1rem 1.25rem 1rem 1rem; font-family:monospace;
                  font-size:.82rem; color:#a78bfa; overflow-x:auto; white-space:pre;
                  margin:0; padding-right:5rem;"
      >&lt;script src="{{ $widgetUrl }}" defer&gt;&lt;/script&gt;</pre>

      <button onclick="copySnippet()"
              id="copy-btn"
              style="position:absolute; top:.65rem; right:.65rem; background:var(--accent);
                     color:#fff; border:none; border-radius:6px; padding:.35rem .8rem;
                     font-size:.75rem; font-weight:600; cursor:pointer; font-family:'Syne',sans-serif;
                     transition:opacity .15s;">
        Copy
      </button>
    </div>
  </div>

  {{-- INSTRUCTIONS --}}
  <div class="card" style="margin-bottom:2rem; background:var(--bg-secondary);">
    <h3 style="margin-bottom:1rem;">How to install</h3>
    <ol style="padding-left:1.4rem; line-height:2.1; color:var(--text-muted); font-size:.9rem;">
      <li>Copy the snippet above.</li>
      <li>Paste it just before the closing <code>&lt;/body&gt;</code> tag on your website.</li>
      <li>A floating ✉ button will appear in the bottom-right corner.</li>
      <li>Submissions go directly to your
        <a href="{{ route('dashboard.forms.show', $form->id) }}">000form dashboard</a>.
      </li>
    </ol>
  </div>

  {{-- LIVE PREVIEW --}}
  <div class="card" style="margin-bottom:2rem;">
    <h3 style="margin-bottom:.75rem;">Live preview</h3>
    <p style="color:var(--text-muted); font-size:.875rem; margin-bottom:1.25rem;">
      This is exactly what will appear on your website.
    </p>
    <div style="background:#f3f3fa; border-radius:12px; height:220px; position:relative;
                overflow:hidden; border:1px solid var(--border-color);">
      <p style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%);
                color:#bbb; font-size:.85rem; white-space:nowrap;">Your website content</p>
      <button style="position:absolute; bottom:20px; right:20px; width:52px; height:52px;
                     border-radius:50%; background:{{ $form->popup_config['buttonColor'] ?? '#166d49' }};
                     border:none; cursor:default; color:#fff; font-size:20px;
                     box-shadow:0 4px 16px rgba(0,0,0,.25); display:flex;
                     align-items:center; justify-content:center;">
        ✉
      </button>
    </div>
  </div>

  {{-- CUSTOMIZE --}}
  <div class="card">
    <h3 style="margin-bottom:1.25rem;">Customize popup</h3>
    <form method="POST" action="{{ route('forms.popup.save', $form->id) }}">
      @csrf
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
        <div>
          <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Title</label>
          <input type="text" name="title"
                 value="{{ $form->popup_config['title'] ?? 'Contact Us' }}"
                 class="form-control">
        </div>
        <div>
          <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Button Color</label>
          <input type="color" name="buttonColor"
                 value="{{ $form->popup_config['buttonColor'] ?? '#166d49' }}"
                 style="height:42px; width:100%; border-radius:8px; cursor:pointer;
                        border:1px solid var(--border-color); padding:2px;">
        </div>
      </div>
      <div style="margin-bottom:1.25rem;">
        <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Description</label>
        <input type="text" name="description"
               value="{{ $form->popup_config['description'] ?? "We'll get back to you as soon as possible." }}"
               class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
  </div>

</div>

<script>
function copySnippet() {
  var pre  = document.getElementById('snippet-code');
  var text = pre.textContent.trim();
  navigator.clipboard.writeText(text).then(function () {
    var btn = document.getElementById('copy-btn');
    btn.textContent = 'Copied!';
    btn.style.opacity = '.7';
    setTimeout(function () {
      btn.textContent  = 'Copy';
      btn.style.opacity = '1';
    }, 2000);
  });
}
</script>
@endsection