<form id="contact-form" action="https://000form.com/f/f_12zr6xuz" method="POST">
  <input type="text"  name="name"    placeholder="Your name"    required>
  <input type="email" name="email"   placeholder="Your email"   required>
  <textarea name="message" placeholder="Your message"></textarea>
    <input type="hidden" name="_template" value="table">
    <!-- Honeypot -->
  <input type="text" name="honeypot_kBaEGgpc" style="display:none">
    <!-- Disable captcha for AJAX -->
  <input type="hidden" name="_captcha" value="false">
  <button type="submit">Send Message</button>
</form>
<div id="form-response" style="margin-top:15px"></div>

<script>
    document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const form = this;
    const box  = document.getElementById('form-response');
    const btn  = form.querySelector('button[type="submit"]');

    box.innerHTML = '';
    btn.disabled = true;
    btn.textContent = 'Sending...';

    try {
        const res = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { 'Accept': 'application/json' }
        });

        const statusCode = res.status;
        const text = await res.text();
        let data = {};
        try { data = JSON.parse(text); } catch(err) {}

        if (statusCode === 200 && data.success) {
        box.innerHTML = '<p style="color:#22c55e;font-weight:500;">✓ Thank you for your submission!</p>';
        form.reset();
        return;
        }

        if (statusCode === 422) {
        if (data.validation_error && Array.isArray(data.errors)) {
            const msgs = data.errors.map(function(e) {
            return '<p style="color:#ef4444;margin:4px 0;">✕ ' + e.field + ': ' + e.message + '</p>';
            });
            box.innerHTML = msgs.join('');
        } else if (data.errors) {
            const msgs = Object.entries(data.errors).map(function([field, errs]) {
            return '<p style="color:#ef4444;margin:4px 0;">✕ ' + field + ': ' + errs[0] + '</p>';
            });
            box.innerHTML = msgs.join('');
        } else {
            box.innerHTML = '<p style="color:#ef4444;">✕ Validation failed.</p>';
        }
        return;
        }

        if (statusCode === 403) {
        box.innerHTML = '<p style="color:#ef4444;">✕ Form is not active or email is not verified.</p>';
        return;
        }

        box.innerHTML = '<p style="color:#ef4444;">✕ ' + (data.message || data.error || 'Something went wrong. Please try again.') + '</p>';

    } catch(err) {
        box.innerHTML = '<p style="color:#ef4444;">✕ Network error: ' + err.message + '</p>';
    } finally {
        btn.disabled = false;
        btn.textContent = 'Send Message';
    }
    });
</script><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/ajax.blade.php ENDPATH**/ ?>