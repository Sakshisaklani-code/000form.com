<?php $__env->startSection('title', 'Reset Password - 000form'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-header">
            <a href="/" class="auth-logo">
                <span>000</span>form
            </a>
            <p class="text-muted">Reset your password</p>
        </div>

        <div class="auth-card">

            
            <?php if(session('message')): ?>
                <div class="alert alert-success mb-3">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-error mb-3">
                    <ul style="margin:0; padding-left:18px;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <p class="text-muted mb-3">
                Enter your email address and we'll send you a link to reset your password.
            </p>

            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('email')); ?>"
                        placeholder="you@example.com"
                        required
                        autofocus
                    >

                    
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger mt-1" style="font-size:14px;">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    Send Reset Link
                </button>

            </form>
        </div>

        <div class="auth-footer">
            Remember your password?
            <a href="<?php echo e(route('login')); ?>">Sign in</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/000form/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>