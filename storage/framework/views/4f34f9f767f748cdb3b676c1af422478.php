(function () {
  'use strict';

  var CFG = {
    action:      "<?php echo e($actionUrl); ?>",
    title:       "<?php echo e(addslashes($config['title'])); ?>",
    description: "<?php echo e(addslashes($config['description'])); ?>",
    buttonColor: "<?php echo e($config['buttonColor']); ?>",
    buttonText:  "<?php echo e(addslashes($config['buttonText'])); ?>",
  };

  // ── Styles ──────────────────────────────────────────────
  var css = [
    '#zzf-btn {',
    '  position:fixed; bottom:24px; right:24px; z-index:999999;',
    '  width:56px; height:56px; border-radius:50%;',
    '  background:' + CFG.buttonColor + '; border:none; cursor:pointer;',
    '  box-shadow:0 4px 20px rgba(0,0,0,.35);',
    '  display:flex; align-items:center; justify-content:center;',
    '  transition:transform .2s, box-shadow .2s;',
    '  font-size:0px; color:#fff;',
    '}',
    '#zzf-btn:hover { transform:scale(1.08); box-shadow:0 8px 28px rgba(0,0,0,.45); }',
    '#zzf-shim {',
    '  display:none; position:fixed; inset:0; z-index:999998;',
    '  background:rgba(0,0,0,.5); backdrop-filter:blur(3px);',
    '}',
    '#zzf-modal {',
    '  display:none; position:fixed; z-index:999999;',
    '  bottom:96px; right:24px;',
    '  width:360px; max-width:calc(100vw - 32px);',
    '  background:#fff; border-radius:16px;',
    '  box-shadow:0 20px 60px rgba(0,0,0,.25);',
    '  font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;',
    '  overflow:hidden;',
    '  transform:translateY(12px) scale(.97);',
    '  transition:transform .22s cubic-bezier(.34,1.56,.64,1), opacity .18s;',
    '  opacity:0;',
    '}',
    '#zzf-modal.open { transform:translateY(0) scale(1); opacity:1; }',
    '#zzf-head {',
    '  background:' + CFG.buttonColor + '; padding:18px 20px;',
    '  display:flex; justify-content:space-between; align-items:flex-start;',
    '}',
    '#zzf-head-txt h3 { margin:0 0 4px; font-size:16px; font-weight:700; color:#fff; }',
    '#zzf-head-txt p  { margin:0; font-size:13px; color:rgba(255,255,255,.8); }',
    '#zzf-close {',
    '  background:rgba(255,255,255,.2); border:none; cursor:pointer;',
    '  width:28px; height:28px; border-radius:50%; color:#fff;',
    '  display:flex; align-items:center; justify-content:center;',
    '  font-size:18px; flex-shrink:0; transition:background .15s;',
    '}',
    '#zzf-close:hover { background:rgba(255,255,255,.35); }',
    '#zzf-body { padding:20px; }',
    '.zzf-field { margin-bottom:14px; }',
    '.zzf-field label { display:block; font-size:12px; font-weight:600; color:#555; margin-bottom:5px; }',
    '.zzf-field input, .zzf-field textarea {',
    '  width:100%; padding:9px 12px; border:1.5px solid #e0e0e0;',
    '  border-radius:8px; font-size:14px; color:#111; outline:none;',
    '  transition:border-color .15s; box-sizing:border-box; font-family:inherit; background:#fff;',
    '}',
    '.zzf-field input:focus, .zzf-field textarea:focus { border-color:' + CFG.buttonColor + '; }',
    '.zzf-field input.zzf-invalid, .zzf-field textarea.zzf-invalid { border-color:#ef4444 !important; }',
    '.zzf-field textarea { resize:vertical; min-height:90px; }',
    '.zzf-err { display:none; color:#ef4444; font-size:11.5px; margin-top:4px; font-weight:500; }',
    '.zzf-err.visible { display:block; }',
    '#zzf-submit {',
    '  width:100%; padding:11px; border:none; border-radius:9px;',
    '  background:' + CFG.buttonColor + '; color:#fff; font-size:14px;',
    '  font-weight:600; cursor:pointer; transition:opacity .15s; margin-top:4px;',
    '}',
    '#zzf-submit:hover { opacity:.88; }',
    '#zzf-submit:disabled { opacity:.5; cursor:not-allowed; }',
    '#zzf-status { text-align:center; padding:16px; font-size:13px; font-weight:500; border-radius:8px; margin-top:12px; }',
    '#zzf-status.success { color:#16a34a; background:#f0fdf4; }',
    '#zzf-status.error   { color:#dc2626; background:#fef2f2; }',
  ].join('\n');

  var styleEl = document.createElement('style');
  styleEl.textContent = css;
  document.head.appendChild(styleEl);

  // ── Build DOM ───────────────────────────────────────────
  var btn = document.createElement('button');
  btn.id = 'zzf-btn';
  btn.setAttribute('aria-label', CFG.buttonText);
  btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16"><path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/><path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8m0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5"/></svg>';

  var shim = document.createElement('div');
  shim.id = 'zzf-shim';

  var modal = document.createElement('div');
  modal.id = 'zzf-modal';
  modal.setAttribute('role', 'dialog');
  modal.setAttribute('aria-modal', 'true');

  var head = document.createElement('div');
  head.id = 'zzf-head';
  head.innerHTML =
    '<div id="zzf-head-txt">' +
      '<h3>' + CFG.title + '</h3>' +
      '<p>' + CFG.description + '</p>' +
    '</div>' +
    '<button id="zzf-close" type="button" aria-label="Close">&times;</button>';

  var body = document.createElement('div');
  body.id = 'zzf-body';
  body.innerHTML =
    '<form id="zzf-form" novalidate>' +
      '<div class="zzf-field">' +
        '<label for="zzf-name">Your Name</label>' +
        '<input type="text" id="zzf-name" name="name" placeholder="Enter your name" autocomplete="name">' +
        '<span class="zzf-err" id="zzf-name-err"></span>' +
      '</div>' +
      '<div class="zzf-field">' +
        '<label for="zzf-email">Email Address</label>' +
        '<input type="email" id="zzf-email" name="email" placeholder="your-email@example.com" autocomplete="email">' +
        '<span class="zzf-err" id="zzf-email-err"></span>' +
      '</div>' +
      '<div class="zzf-field">' +
        '<label for="zzf-msg">Message</label>' +
        '<textarea id="zzf-msg" name="message" placeholder="How can we help?"></textarea>' +
        '<span class="zzf-err" id="zzf-msg-err"></span>' +
      '</div>' +
      '<button type="submit" id="zzf-submit">Send Message</button>' +
    '</form>' +
    '<div id="zzf-status" style="display:none"></div>';

  modal.appendChild(head);
  modal.appendChild(body);

  // ── Mount ───────────────────────────────────────────────
  function mountWidget() {
    document.body.appendChild(shim);
    document.body.appendChild(modal);
    document.body.appendChild(btn);
    bindEvents();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountWidget);
  } else {
    mountWidget();
  }

  // ── Open / Close ────────────────────────────────────────
  function openModal() {
    shim.style.display  = 'block';
    modal.style.display = 'block';
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        modal.classList.add('open');
      });
    });
    var f = document.getElementById('zzf-name');
    if (f) f.focus();
  }

  function closeModal() {
    modal.classList.remove('open');
    setTimeout(function () {
      shim.style.display  = 'none';
      modal.style.display = 'none';
    }, 220);
  }

  // ── Helpers ─────────────────────────────────────────────
  function isValidEmail(val) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(val);
  }

  function setError(inputId, errId, message) {
    var input = document.getElementById(inputId);
    var span  = document.getElementById(errId);
    if (input) input.classList.add('zzf-invalid');
    if (span)  { span.textContent = message; span.classList.add('visible'); }
  }

  function clearError(inputId, errId) {
    var input = document.getElementById(inputId);
    var span  = document.getElementById(errId);
    if (input) input.classList.remove('zzf-invalid');
    if (span)  { span.textContent = ''; span.classList.remove('visible'); }
  }

  function clearAllErrors() {
    clearError('zzf-name',  'zzf-name-err');
    clearError('zzf-email', 'zzf-email-err');
    clearError('zzf-msg',   'zzf-msg-err');
  }

  // ── Frontend validation — only basic required + email format ──
  function validateAll() {
    var valid = true;

    var name = document.getElementById('zzf-name').value.trim();
    if (!name) {
      setError('zzf-name', 'zzf-name-err', 'Name is required.');
      valid = false;
    } else {
      clearError('zzf-name', 'zzf-name-err');
    }

    var email = document.getElementById('zzf-email').value.trim();
    if (!email) {
      setError('zzf-email', 'zzf-email-err', 'Email is required.');
      valid = false;
    } else if (!isValidEmail(email)) {
      setError('zzf-email', 'zzf-email-err', 'Enter a valid email address.');
      valid = false;
    } else {
      clearError('zzf-email', 'zzf-email-err');
    }

    var message = document.getElementById('zzf-msg').value.trim();
    if (!message) {
      setError('zzf-msg', 'zzf-msg-err', 'Message is required.');
      valid = false;
    } else {
      clearError('zzf-msg', 'zzf-msg-err');
    }

    return valid;
  }

  // ── Map backend field names to widget field IDs ──────────
  var fieldMap = {
    'name':    ['zzf-name',  'zzf-name-err'],
    'email':   ['zzf-email', 'zzf-email-err'],
    'message': ['zzf-msg',   'zzf-msg-err'],
  };

  function applyBackendErrors(errors) {
    var unmatched = [];

    // errors can be our custom array format [{field, message}]
    // or standard Laravel object format {field: [messages]}
    if (Array.isArray(errors)) {
      errors.forEach(function (err) {
        var pair = fieldMap[err.field];
        if (pair) {
          setError(pair[0], pair[1], err.message);
        } else {
          unmatched.push(err.field + ': ' + err.message);
        }
      });
    } else {
      Object.keys(errors).forEach(function (field) {
        var pair = fieldMap[field];
        var msg  = Array.isArray(errors[field]) ? errors[field][0] : errors[field];
        if (pair) {
          setError(pair[0], pair[1], msg);
        } else {
          unmatched.push(field + ': ' + msg);
        }
      });
    }

    return unmatched;
  }

  // ── Events ──────────────────────────────────────────────
  function bindEvents() {
    btn.addEventListener('click', openModal);
    shim.addEventListener('click', closeModal);
    document.getElementById('zzf-close').addEventListener('click', closeModal);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeModal();
    });

    var fields = [
      ['zzf-name',  'zzf-name-err'],
      ['zzf-email', 'zzf-email-err'],
      ['zzf-msg',   'zzf-msg-err'],
    ];
    fields.forEach(function (pair) {
      var el = document.getElementById(pair[0]);
      if (el) el.addEventListener('input', function () { clearError(pair[0], pair[1]); });
    });

    document.getElementById('zzf-form').addEventListener('submit', handleSubmit);
  }

  // ── Submit ──────────────────────────────────────────────
  function handleSubmit(e) {
    e.preventDefault();

    if (!validateAll()) return;

    var submitBtn = document.getElementById('zzf-submit');
    var statusDiv = document.getElementById('zzf-status');
    var formEl    = document.getElementById('zzf-form');

    statusDiv.style.display = 'none';
    statusDiv.textContent   = '';
    clearAllErrors();

    submitBtn.disabled    = true;
    submitBtn.textContent = 'Sending\u2026';

    var formData = new FormData();
    formData.append('name',    document.getElementById('zzf-name').value.trim());
    formData.append('email',   document.getElementById('zzf-email').value.trim());
    formData.append('message', document.getElementById('zzf-msg').value.trim());
    formData.append('_captcha', 'false');

    fetch(CFG.action, {
      method:  'POST',
      headers: { 'Accept': 'application/json' },
      body:    formData,
    })
    .then(function (res) {
      var status = res.status;
      return res.text().then(function (text) {
        return { status: status, text: text };
      });
    })
    .then(function (result) {
      submitBtn.disabled    = false;
      submitBtn.textContent = 'Send Message';

      // ── Success ──
      if (result.status >= 200 && result.status < 300) {
        try {
          var json = JSON.parse(result.text);
          // If server wants a captcha redirect, ignore it — popup disables captcha
          if (json.redirect) {
            statusDiv.style.display = 'block';
            statusDiv.className     = 'error';
            statusDiv.textContent   = 'Unexpected redirect. Please try again.';
            return;
          }
        } catch (e) { /* not JSON — fine */ }

        formEl.reset();
        statusDiv.style.display = 'block';
        statusDiv.className     = 'success';
        statusDiv.textContent   = 'Thanks! We\'ll be in touch soon. \u2713';
        setTimeout(function () { statusDiv.style.display = 'none'; }, 4000);
        return;
      }

      statusDiv.style.display = 'block';
      statusDiv.className     = 'error';

      // ── 422 — backend validation errors (user-configured rules) ──
      if (result.status === 422) {
        try {
          var json = JSON.parse(result.text);

          // Our custom format: { validation_error: true, errors: [{field, message}] }
          if (json.validation_error && Array.isArray(json.errors)) {
            var unmatched = applyBackendErrors(json.errors);
            if (unmatched.length) {
              statusDiv.textContent = unmatched.join(' · ');
            } else {
              statusDiv.style.display = 'none';
            }
            return;
          }

          // Standard Laravel format: { errors: { field: [messages] } }
          if (json.errors) {
            var unmatched = applyBackendErrors(json.errors);
            if (unmatched.length) {
              statusDiv.textContent = unmatched.join(' · ');
            } else {
              statusDiv.style.display = 'none';
            }
            return;
          }

          statusDiv.textContent = json.message || 'Validation failed.';
        } catch (e) {
          statusDiv.textContent = 'Validation failed.';
        }
        return;
      }

      // ── Other errors ──
      if (result.status === 419) {
        statusDiv.textContent = 'Session expired. Please refresh and try again.';
        return;
      }
      if (result.status === 403) {
        statusDiv.textContent = 'Form is not active or not verified.';
        return;
      }
      if (result.status === 404) {
        statusDiv.textContent = 'Form not found.';
        return;
      }
      if (result.status === 500) {
        statusDiv.textContent = 'Server error. Please try again later.';
        return;
      }

      statusDiv.textContent = 'Error ' + result.status + '. Please try again.';
    })
    .catch(function (err) {
      submitBtn.disabled      = false;
      submitBtn.textContent   = 'Send Message';
      statusDiv.style.display = 'block';
      statusDiv.className     = 'error';
      statusDiv.textContent   = 'Network error: ' + err.message;
    });
  }

})();<?php /**PATH C:\Git-folders\000form.com\resources\views/formbutton/widget.blade.php ENDPATH**/ ?>