// {{-- This file is served as application/javascript --}}
// {{-- Blade injects config vars, then the rest is JS --}}
(function () {
  'use strict';

  // ── Config injected from PHP ────────────────────────────
  var CFG = {
    action:      '{{ $actionUrl }}',
    csrfToken:   '{{ csrf_token() }}',
  };

  // ── Inject styles ───────────────────────────────────────
  var css = `
    #zzf-btn {
      position: fixed; bottom: 24px; right: 24px; z-index: 999999;
      width: 56px; height: 56px; border-radius: 50%;
      background: ` + CFG.buttonColor + `; border: none; cursor: pointer;
      box-shadow: 0 4px 20px rgba(0,0,0,.35);
      display: flex; align-items: center; justify-content: center;
      transition: transform .2s, box-shadow .2s;
    }
    #zzf-btn:hover { transform: scale(1.08); box-shadow: 0 8px 28px rgba(0,0,0,.45); }
    #zzf-shim {
      display: none; position: fixed; inset: 0; z-index: 999998;
      background: rgba(0,0,0,.5); backdrop-filter: blur(3px);
    }
    #zzf-modal {
      display: none; position: fixed; z-index: 999999;
      bottom: 96px; right: 24px;
      width: 360px; max-width: calc(100vw - 32px);
      background: #fff; border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0,0,0,.25);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      overflow: hidden;
      transform: translateY(12px) scale(.97);
      transition: transform .22s cubic-bezier(.34,1.56,.64,1), opacity .18s;
      opacity: 0;
    }
    #zzf-modal.open { transform: translateY(0) scale(1); opacity: 1; }
    #zzf-head {
      background: ` + CFG.buttonColor + `; padding: 18px 20px;
      display: flex; justify-content: space-between; align-items: flex-start;
    }
    #zzf-head-txt h3 { margin:0 0 4px; font-size:16px; font-weight:700; color:#fff; }
    #zzf-head-txt p  { margin:0; font-size:13px; color:rgba(255,255,255,.8); }
    #zzf-close {
      background: rgba(255,255,255,.2); border: none; cursor: pointer;
      width:26px; height:26px; border-radius:50%; color:#fff;
      display:flex; align-items:center; justify-content:center;
      font-size:16px; line-height:1; flex-shrink:0; margin-top:2px;
      transition: background .15s;
    }
    #zzf-close:hover { background: rgba(255,255,255,.35); }
    #zzf-body { padding: 20px; }
    .zzf-field { margin-bottom:14px; }
    .zzf-field label { display:block; font-size:12px; font-weight:600; color:#555; margin-bottom:5px; letter-spacing:.02em; }
    .zzf-field input,
    .zzf-field textarea {
      width:100%; padding:9px 12px; border:1.5px solid #e0e0e0;
      border-radius:8px; font-size:14px; color:#111; outline:none;
      transition: border-color .15s; box-sizing:border-box;
      font-family:inherit; background:#fff;
    }
    .zzf-field input:focus,
    .zzf-field textarea:focus { border-color:` + CFG.buttonColor + `; }
    .zzf-field textarea { resize: vertical; min-height: 90px; }
    #zzf-submit {
      width:100%; padding:11px; border:none; border-radius:9px;
      background:` + CFG.buttonColor + `; color:#fff; font-size:14px;
      font-weight:600; cursor:pointer; letter-spacing:.02em;
      transition: opacity .15s;
    }
    #zzf-submit:hover { opacity:.88; }
    #zzf-submit:disabled { opacity:.5; cursor:not-allowed; }
    #zzf-status { text-align:center; padding:24px 20px; font-size:14px; font-weight:500; }
    #zzf-status.success { color:#16a34a; }
    #zzf-status.error   { color:#dc2626; }
  `;

  var style = document.createElement('style');
  style.textContent = css;
  document.head.appendChild(style);

  // ── Build HTML ──────────────────────────────────────────
  var btn = document.createElement('button');
  btn.id = 'zzf-btn';
  btn.setAttribute('aria-label', CFG.buttonText);
  btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/><path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/></svg>';

  var shim = document.createElement('div');
  shim.id = 'zzf-shim';

  var modal = document.createElement('div');
  modal.id = 'zzf-modal';
  modal.setAttribute('role', 'dialog');
  modal.setAttribute('aria-modal', 'true');
  modal.innerHTML = `
    <div id="zzf-head">
      <div id="zzf-head-txt">
        <h3>` + CFG.title + `</h3>
        <p>` + CFG.description + `</p>
      </div>
      <button id="zzf-close" aria-label="Close">×</button>
    </div>
    <div id="zzf-body">
      <form id="zzf-form" novalidate>
        <div class="zzf-field">
          <label for="zzf-name">Your Name</label>
          <input type="text" id="zzf-name" name="name" required placeholder="Enter your name">
        </div>
        <div class="zzf-field">
          <label for="zzf-email">Email Address</label>
          <input type="email" id="zzf-email" name="email" required placeholder="your-email@example.com">
        </div>
        <div class="zzf-field">
          <label for="zzf-msg">Message</label>
          <textarea id="zzf-msg" name="message" required placeholder="How can we help?"></textarea>
        </div>
        <button type="submit" id="zzf-submit">Send Message</button>
      </form>
      <div id="zzf-status" style="display:none"></div>
    </div>
  `;

  // ── Mount to DOM ────────────────────────────────────────
  document.addEventListener('DOMContentLoaded', function () {
    document.body.appendChild(shim);
    document.body.appendChild(modal);
    document.body.appendChild(btn);
    bindEvents();
  });

  // ── Open / Close ────────────────────────────────────────
  function open() {
    shim.style.display = 'block';
    modal.style.display = 'block';
    requestAnimationFrame(function() { modal.classList.add('open'); });
    document.getElementById('zzf-name').focus();
  }

  function close() {
    modal.classList.remove('open');
    setTimeout(function() {
      shim.style.display = 'none';
      modal.style.display = 'none';
    }, 200);
  }

  // ── Events ──────────────────────────────────────────────
  function bindEvents() {
    btn.addEventListener('click', open);
    shim.addEventListener('click', close);
    document.getElementById('zzf-close').addEventListener('click', close);

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') close();
    });

    document.getElementById('zzf-form').addEventListener('submit', handleSubmit);
  }

  // ── Submit ──────────────────────────────────────────────
  function handleSubmit(e) {
    e.preventDefault();

    var submitBtn  = document.getElementById('zzf-submit');
    var statusDiv  = document.getElementById('zzf-status');
    var form       = document.getElementById('zzf-form');
    var formData   = new FormData(form);

    submitBtn.disabled     = true;
    submitBtn.textContent  = 'Sending…';

    fetch(CFG.action, {
      method:  'POST',
      headers: {
        'Accept':       'application/json',
        'X-CSRF-TOKEN': CFG.csrfToken,
      },
      body: formData,
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      form.style.display      = 'none';
      statusDiv.style.display = 'block';
      statusDiv.className     = 'success';
      statusDiv.textContent   = 'Thanks! We\'ll be in touch soon. ✓';
    })
    .catch(function() {
      submitBtn.disabled    = false;
      submitBtn.textContent = 'Send Message';
      statusDiv.style.display = 'block';
      statusDiv.className   = 'error';
      statusDiv.textContent = 'Oops, something went wrong. Please try again.';
    });
  }

})();