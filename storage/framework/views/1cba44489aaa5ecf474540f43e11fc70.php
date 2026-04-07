


<?php $__env->startSection('title', 'Edit ' . $project->name); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <a href="<?php echo e(route('dashboard.projects.show', $project->id)); ?>" class="text-muted" style="font-size: 0.875rem;">
            ← Back to <?php echo e($project->name); ?>

        </a>
        <h1 class="page-title">Project Settings</h1>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 300px; gap: 2rem; align-items: start;">

    
    <div class="card">
        <?php if($errors->any()): ?>
            <div class="alert alert-error mb-3"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('dashboard.projects.update', $project->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name" class="form-label">Project Name <span style="color:var(--error)">*</span></label>
                <input type="text" id="name" name="name" class="form-input"
                       value="<?php echo e(old('name', $project->name)); ?>" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description <span style="color:var(--text-muted)">optional</span></label>
                <input type="text" id="description" name="description" class="form-input"
                       value="<?php echo e(old('description', $project->description)); ?>"
                       placeholder="Short description">
            </div>

            <div class="form-group">
                <label class="form-label">Project Colour</label>
                <div style="display: flex; gap: 0.6rem; flex-wrap: wrap;">
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
                        $selected = old('color', $project->color);
                    ?>
                    <?php $__currentLoopData = $palette; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label style="cursor: pointer;">
                            <input type="radio" name="color" value="<?php echo e($hex); ?>"
                                   <?php echo e($selected === $hex ? 'checked' : ''); ?>

                                   style="display: none;" class="color-radio">
                            <span class="color-swatch"
                                  style="display: block; width: 28px; height: 28px; border-radius: 50%;
                                         background: <?php echo e($hex); ?>; border: 3px solid transparent;
                                         transition: border-color 0.15s;"
                                  title="<?php echo e($label); ?>"></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-input" disabled>
                    <option value="active"   <?php echo e($project->status === 'active'   ? 'selected' : ''); ?>>Active</option>
                    <option value="archived" <?php echo e($project->status === 'archived' ? 'selected' : ''); ?>>Archived</option>
                </select>
                <input type="hidden" name="status" value="<?php echo e($project->status); ?>">


            </div>

            <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo e(route('dashboard.projects.show', $project->id)); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    
    <div class="card" style="border-color: rgba(255,68,68,0.3);">
        <h4 style="color: var(--error); margin-bottom: 1rem;">Danger Zone</h4>
        <p class="text-muted" style="font-size: 0.875rem; margin-bottom: 1rem;">
            Deleting this project will <strong>DELETE</strong> all forms inside it — and submissions will be lost.
        </p>
        <form id="delete-project-form" method="POST"
              action="<?php echo e(route('dashboard.projects.destroy', $project->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="button" class="btn btn-danger btn-sm"
                onclick="if(confirm(<?php echo e(json_encode('Delete project "' . $project->name . '"? This will delete the project and all forms inside it.')); ?>)) document.getElementById('delete-project-form').submit();">
                Delete Project
            </button>
        </form>
        
    </div>
</div>

<script>
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
        radio.closest('label').querySelector('.color-swatch').addEventListener('click', function () {
            radio.checked = true; syncSwatches();
        });
    });
    syncSwatches();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/dashboard/projects/edit.blade.php ENDPATH**/ ?>