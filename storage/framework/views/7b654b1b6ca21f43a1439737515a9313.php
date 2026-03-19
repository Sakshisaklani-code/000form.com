

<?php $__env->startSection('title', 'Sign Up - 000form'); ?>

<?php $__env->startSection('content'); ?>

<div style="max-width:600px;margin:60px auto;padding:20px;">

    <div style="text-align:center;margin-bottom:30px;">
        <span style="font-family:'Courier New',monospace;font-size:28px;font-weight:bold;color:#fafafa;">
        <span style="color:#00ff88;">000</span>form
        </span>
    </div>

    <div style="background:#111111;border:1px solid #1a1a1a;border-radius:12px;padding:40px;text-align:center;">

        <h1 style="color:#fafafa;margin-bottom:12px;">Verification Link Expired</h1>

        <p style="color:#888888;margin-bottom:30px;">
        Your verification link has expired. Enter your email to receive a new one.
        </p>

        <?php if(session('success')): ?>
        <p style="color:#00ff88;margin-bottom:20px;">
        <?php echo e(session('success')); ?>

        </p>
        <?php endif; ?>

        <?php if($errors->any()): ?>
        <p style="color:#ff4d4d;margin-bottom:20px;">
        <?php echo e($errors->first()); ?>

        </p>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('verification.resend')); ?>">
            <?php echo csrf_field(); ?>

            <input type="email"
            name="email"
            placeholder="Enter your email"
            required
            style="width:100%;padding:14px;background:#0a0a0a;border:1px solid #1a1a1a;border-radius:8px;color:#fafafa;margin-bottom:20px;">

            <button type="submit"
            style="width:100%;padding:14px;background:#00ff88;color:#050505;border:none;border-radius:8px;font-weight:600;cursor:pointer;">
            Resend Verification Email
            </button>

        </form>

    </div>

    <div style="text-align:center;margin-top:20px;color:#555;font-size:12px;">
    © 2026 000form
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views\auth\verification-expired.blade.php ENDPATH**/ ?>