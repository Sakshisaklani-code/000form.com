

<?php $__env->startSection('title', 'Embed Popup — ' . $form->name); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width:700px; margin:0 auto; padding:3rem 1.5rem;">

  <h1 style="font-family:'Syne',sans-serif; font-size:1.75rem; font-weight:800; margin-bottom:.5rem;">
    Popup Embed
  </h1>
  <p style="color:var(--text-muted); margin-bottom:2.5rem;">
    Add this single line to any website to show a floating contact button powered by
    <strong><?php echo e($form->name); ?></strong>.
  </p>

  <?php if(session('success')): ?>
    <div style="background:rgba(34,197,94,.1); border:1px solid rgba(34,197,94,.25); color:#16a34a;
                border-radius:8px; padding:.875rem 1.25rem; margin-bottom:1.5rem; font-size:.875rem;">
      <?php echo e(session('success')); ?>

    </div>
  <?php endif; ?>

  
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
      >&lt;script src="<?php echo e($widgetUrl); ?>" defer&gt;&lt;/script&gt;</pre>

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

  
  <?php if(isset($validations) && $validations->count() > 0): ?>
    <div style="background:rgba(65,66,101,0.06); border:1px solid rgba(65,66,101,0.15);
                border-radius:8px; padding:.9rem 1.1rem; margin-bottom:2rem;
                display:flex; align-items:flex-start; gap:.75rem;">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#414265" stroke-width="2"
           style="flex-shrink:0; margin-top:1px;">
        <polyline points="9 11 12 14 22 4"/>
        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
      </svg>
      <div>
        <p style="margin:0 0 .4rem; font-size:.82rem; color:var(--text-muted); line-height:1.5;">
          <strong style="color:var(--text);"><?php echo e($validations->count()); ?> backend validation rule<?php echo e($validations->count() !== 1 ? 's' : ''); ?> active.</strong>
          The popup will show inline errors for fields that fail these rules.
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:.4rem;">
          <?php $__currentLoopData = $validations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span style="background:rgba(65,66,101,0.12); color:#414265; font-size:.72rem;
                         font-weight:600; padding:.2rem .6rem; border-radius:999px;">
              <?php echo e($v->field_name); ?>

              <?php if($v->is_required): ?> · required <?php endif; ?>
              <?php if($v->min_length): ?> · min <?php echo e($v->min_length); ?> <?php endif; ?>
              <?php if($v->max_length): ?> · max <?php echo e($v->max_length); ?> <?php endif; ?>
            </span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div style="background:rgba(148,163,184,0.08); border:1px solid var(--border-color);
                border-radius:8px; padding:.9rem 1.1rem; margin-bottom:2rem;
                display:flex; align-items:center; gap:.75rem;">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <line x1="12" y1="8" x2="12" y2="12"/>
        <line x1="12" y1="16" x2="12.01" y2="16"/>
      </svg>
      <p style="margin:0; font-size:.82rem; color:var(--text-muted);">
        No backend validations configured. Only basic required field checks will apply.
        <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>?panel=workflow"
           style="color:#414265; font-weight:600;">Add validations →</a>
      </p>
    </div>
  <?php endif; ?>

  
  <div class="card" style="margin-bottom:2rem; background:var(--bg-secondary);">
    <h3 style="margin-bottom:1rem;">How to install</h3>
    <ol style="padding-left:1.4rem; line-height:2.1; color:var(--text-muted); font-size:.9rem;">
      <li>Copy the snippet above.</li>
      <li>Paste it just before the closing <code>&lt;/body&gt;</code> tag on your website.</li>
      <li>A floating ✉ button will appear in the bottom-right corner.</li>
      <li>Submissions go directly to your
        <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>">000form dashboard</a>.
      </li>
    </ol>
  </div>

  
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
                     border-radius:50%; background:<?php echo e($form->popup_config['buttonColor'] ?? '#166d49'); ?>;
                     border:none; cursor:default; color:#fff; font-size:20px;
                     box-shadow:0 4px 16px rgba(0,0,0,.25); display:flex;
                     align-items:center; justify-content:center;">
        ✉
      </button>
    </div>
  </div>

  
  <div class="card">
    <h3 style="margin-bottom:1.25rem;">Customize popup</h3>
    <form method="POST" action="<?php echo e(route('forms.popup.save', $form->id)); ?>">
      <?php echo csrf_field(); ?>
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
        <div>
          <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Title</label>
          <input type="text" name="title"
                 value="<?php echo e($form->popup_config['title'] ?? 'Contact Us'); ?>"
                 class="form-control">
        </div>
        <div>
          <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Button Color</label>
          <input type="color" name="buttonColor"
                 value="<?php echo e($form->popup_config['buttonColor'] ?? '#166d49'); ?>"
                 style="height:42px; width:100%; border-radius:8px; cursor:pointer;
                        border:1px solid var(--border-color); padding:2px;">
        </div>
      </div>
      <div style="margin-bottom:1.25rem;">
        <label style="font-size:.8rem; font-weight:600; display:block; margin-bottom:.4rem;">Description</label>
        <input type="text" name="description"
               value="<?php echo e($form->popup_config['description'] ?? "We'll get back to you as soon as possible."); ?>"
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views\forms\embed.blade.php ENDPATH**/ ?>