

<?php $__env->startSection('title', 'Validation Error - 000form'); ?>

<?php $__env->startSection('content'); ?>

<div class="auth-page">
    <div class="auth-container text-center">

```
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
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="margin-bottom:0.5rem;">
                    <strong><?php echo e($error['field']); ?></strong> — <?php echo e($error['message']); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <button onclick="history.back()" class="btn btn-primary">
        Go Back
    </button>

</div>
```

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/validation-error.blade.php ENDPATH**/ ?>