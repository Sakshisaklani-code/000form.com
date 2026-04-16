


<?php $__env->startSection('title', 'Create Project'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <a href="<?php echo e(route('dashboard')); ?>" class="text-muted" style="font-size: 0.875rem;">← Dashboard</a>
        <h1 class="page-title">Create New Project</h1>
    </div>
</div>

<div class="card" style="max-width: 560px;">
    <?php if($errors->any()): ?>
        <div class="alert alert-error mb-3"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <p class="text-muted" style="margin-bottom: 1.5rem; font-size: 0.9rem;">
        Projects help you organise related form endpoints together — for example, all forms for a single client or website.
    </p>

    <form method="POST" action="<?php echo e(route('dashboard.projects.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="name" class="form-label">Project Name <span style="color:var(--error)">*</span></label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-input"
                value="<?php echo e(old('name')); ?>"
                placeholder="e.g., Acme Corp, My Portfolio Site"
                required
                autofocus
            >
            <p class="form-help">Give it a clear name so you can find it quickly.</p>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description <span style="color:var(--text-muted)">optional</span></label>
            <input
                type="text"
                id="description"
                name="description"
                class="form-input"
                value="<?php echo e(old('description')); ?>"
                placeholder="Short description of what this project is for"
            >
        </div>

        <div class="form-group">
            <label class="form-label">Project Colour</label>
            <div style="display: flex; gap: 0.6rem; flex-wrap: wrap;" id="colorPicker">
                <?php
                    $palette = [
                        '#6366f1' => 'Indigo',
                        '#8b5cf6' => 'Violet',
                        '#ec4899' => 'Pink',
                        '#f59e0b' => 'Amber',
                        '#10b981' => 'Emerald',
                        '#3b82f6' => 'Blue',
                        '#ef4444' => 'Red',
                        '#64748b' => 'Slate',
                    ];
                    $selected = old('color', '#6366f1');
                ?>
                <?php $__currentLoopData = $palette; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label style="cursor: pointer; display: flex; flex-direction: column; align-items: center; gap: 0.3rem;">
                        <input type="radio" name="color" value="<?php echo e($hex); ?>"
                               <?php echo e($selected === $hex ? 'checked' : ''); ?>

                               style="display: none;" class="color-radio">
                        <span class="color-swatch"
                              style="display: block; width: 28px; height: 28px; border-radius: 50%;
                                     background: <?php echo e($hex); ?>; border: 5px solid white;
                                     transition: border-color 0.15s;"
                              data-hex="<?php echo e($hex); ?>"
                              title="<?php echo e($label); ?>"></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Project</button>
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
<style>
    .color-radio:checked + .color-swatch {
    transform: scale(1.35);
}
</style>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        function syncSwatches() {
            document.querySelectorAll('.color-radio').forEach(function (radio) {
                const swatch = radio.closest('label').querySelector('.color-swatch');
                swatch.style.borderColor = radio.checked ? radio.value : 'transparent';
                swatch.style.boxShadow   = radio.checked ? '0 0 0 2px var(--bg-primary)' : 'none';
            });
        }

        document.querySelectorAll('.color-radio').forEach(function (radio) {
            radio.addEventListener('change', syncSwatches);
            // Click on swatch selects radio
            radio.closest('label').querySelector('.color-swatch').addEventListener('click', function () {
                radio.checked = true;
                syncSwatches();
            });
        });

        syncSwatches();
    });
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function syncSwatches() {
            document.querySelectorAll('.color-radio').forEach(function (radio) {
                const swatch = radio.closest('label').querySelector('.color-swatch');
                if (radio.checked) {
                    swatch.style.border = '3px solid white'; // fixed white border for selected
                    swatch.style.boxShadow = '0 0 0 2px var(--bg-primary)';
                } else {
                    swatch.style.border = '3px solid transparent'; // unselected
                    swatch.style.boxShadow = 'none';
                }
            });
        }

        document.querySelectorAll('.color-radio').forEach(function (radio) {
            radio.addEventListener('change', syncSwatches);
            radio.closest('label').querySelector('.color-swatch').addEventListener('click', function () {
                radio.checked = true; 
                syncSwatches();
            });
        });

        syncSwatches();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/000form/resources/views/dashboard/projects/create.blade.php ENDPATH**/ ?>