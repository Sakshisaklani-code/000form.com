<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <a href="<?php echo e(route('dashboard.projects.create')); ?>" class="btn btn-primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        New Project
    </a>
</div>


<div class="stats-grid">
    <div class="card stat-card">
        <div class="stat-label">Projects</div>
        <div class="stat-value"><?php echo e($stats['total_projects']); ?></div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Total Forms</div>
        <div class="stat-value"><?php echo e($stats['total_forms']); ?></div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Total Submissions</div>
        <div class="stat-value"><?php echo e(number_format($stats['total_submissions'])); ?></div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Valid</div>
        <div class="stat-value" style="color: var(--accent);"><?php echo e(number_format($stats['total_valid'])); ?></div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Spam Blocked</div>
        <div class="stat-value" style="color: #ff6b6b;"><?php echo e(number_format($stats['total_spam'])); ?></div>
    </div>
    <div class="card stat-card">
        <div class="stat-label">Unread</div>
        <div class="stat-value accent"><?php echo e($stats['total_unread']); ?></div>
    </div>
</div>


<?php if($projects->count() > 0): ?>
    <div style="display: flex; flex-direction: column; gap: 2rem; margin-bottom: 2rem;">
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="padding: 0; overflow: hidden;">

                
                <div style="display: flex; align-items: center; justify-content: space-between;
                            padding: 1.1rem 1.5rem; border-bottom: 1px solid var(--border-color);
                            background: var(--bg-secondary);">
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        
                        <span style="display: inline-block; width: 10px; height: 10px;
                                     border-radius: 50%; background: <?php echo e($project->color); ?>;
                                     flex-shrink: 0;"></span>
                        <a href="<?php echo e(route('dashboard.projects.show', $project->id)); ?>"
                           style="font-weight: 600; font-size: 1rem; color: var(--text); text-decoration: none;">
                            <?php echo e($project->name); ?>

                        </a>
                        <?php if($project->description): ?>
                            <span style="font-size: 0.8rem; color: var(--text-muted);">— <?php echo e($project->description); ?></span>
                        <?php endif; ?>
                        <?php $projectUnread = $project->forms->sum('unread_count'); ?>
                        <?php if($projectUnread > 0): ?>
                            <span class="badge badge-success"><?php echo e($projectUnread); ?> new</span>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="font-size: 0.8rem; color: var(--text-muted);">
                            <?php echo e($project->forms->count()); ?> <?php echo e(Str::plural('form', $project->forms->count())); ?>

                        </span>
                        <a href="<?php echo e(route('dashboard.forms.create', ['project_id' => $project->id])); ?>"
                           class="btn btn-ghost btn-sm">
                            + Add Form
                        </a>
                        <a href="<?php echo e(route('dashboard.projects.show', $project->id)); ?>"
                           class="btn btn-ghost btn-sm">View</a>
                        <a href="<?php echo e(route('dashboard.projects.edit', $project->id)); ?>"
                           class="btn btn-ghost btn-sm">Settings</a>
                    </div>
                </div>

                
                <?php if($project->forms->count() > 0): ?>
                    <div class="table-wrapper" style="margin: 0; border: none; border-radius: 0;">
                        <table class="table" style="margin: 0;">
                            <thead>
                                <tr>
                                    <th>Form Name</th>
                                    <th>Endpoint</th>
                                    <th>Total</th>
                                    <th>Valid</th>
                                    <th>Spam</th>
                                    <th>Status</th>
                                    <th>Last Submission</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $project->forms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>" class="table-link">
                                                <?php echo e($form->name); ?>

                                            </a>
                                            <?php if($form->unread_count > 0): ?>
                                                <span class="badge badge-success" style="margin-left: 0.5rem;">
                                                    <?php echo e($form->unread_count); ?> new
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <code class="mono" style="font-size: 0.85rem; color: var(--text-muted);">
                                                /f/<?php echo e($form->slug); ?>

                                            </code>
                                        </td>
                                        <td><?php echo e(number_format($form->submission_count)); ?></td>
                                        <td style="color: var(--accent);"><?php echo e(number_format($form->valid_count)); ?></td>
                                        <td style="color: #ff6b6b;"><?php echo e(number_format($form->spam_count)); ?></td>
                                        <td>
                                            <?php if(!$form->email_verified): ?>
                                                <span class="badge badge-warning">
                                                    <span class="badge-dot"></span>Pending Verification
                                                </span>
                                            <?php elseif($form->status === 'active'): ?>
                                                <span class="badge badge-success">
                                                    <span class="badge-dot"></span>Active
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">
                                                    <span class="badge-dot"></span>Paused
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-muted">
                                            <?php echo e($form->last_submission_at ? $form->last_submission_at->diffForHumans() : 'Never'); ?>

                                        </td>
                                        <td class="text-right">
                                            <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>"
                                               class="btn btn-ghost btn-sm">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div style="padding: 2rem 1.5rem; text-align: center; color: var(--text-muted); font-size: 0.9rem;">
                        No forms yet in this project.
                        <a href="<?php echo e(route('dashboard.forms.create', ['project_id' => $project->id])); ?>"
                           style="color: var(--accent); margin-left: 0.25rem;">Add your first form →</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>


<?php if($projects->count() === 0 && $standaloneForms->count() === 0): ?>
    <div class="card">
        <div class="empty-state">
            <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/>
            </svg>
            <h3 class="empty-title">No projects yet</h3>
            <p class="empty-description">Create a project to organise your form endpoints.</p>
            <a href="<?php echo e(route('dashboard.projects.create')); ?>" class="btn btn-primary">
                Create Your First Project
            </a>
        </div>
    </div>
<?php endif; ?>




<?php if($standaloneForms->count() > 0): ?>
    <div style="margin-top: 2rem;">
        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
            <h2 style="font-size: 1rem; font-weight: 600; color: var(--text-secondary); margin: 0;">
                Standalone Forms
            </h2>
            <span style="font-size: 0.75rem; color: var(--text-muted);
                         background: var(--bg-tertiary); padding: 0.2rem 0.6rem;
                         border-radius: 999px; border: 1px solid var(--border-color);">
                legacy — created before projects
            </span>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Endpoint</th>
                        <th>Total</th>
                        <th>Valid</th>
                        <th>Spam</th>
                        <th>Status</th>
                        <th>Last Submission</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $standaloneForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>" class="table-link">
                                    <?php echo e($form->name); ?>

                                </a>
                                <?php if($form->unread_count > 0): ?>
                                    <span class="badge badge-success" style="margin-left: 0.5rem;">
                                        <?php echo e($form->unread_count); ?> new
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <code class="mono" style="font-size: 0.85rem; color: var(--text-muted);">
                                    /f/<?php echo e($form->slug); ?>

                                </code>
                            </td>
                            <td><?php echo e(number_format($form->submission_count)); ?></td>
                            <td style="color: var(--accent);"><?php echo e(number_format($form->valid_count)); ?></td>
                            <td style="color: #ff6b6b;"><?php echo e(number_format($form->spam_count)); ?></td>
                            <td>
                                <?php if(!$form->email_verified): ?>
                                    <span class="badge badge-warning">
                                        <span class="badge-dot"></span>Pending Verification
                                    </span>
                                <?php elseif($form->status === 'active'): ?>
                                    <span class="badge badge-success">
                                        <span class="badge-dot"></span>Active
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-warning">
                                        <span class="badge-dot"></span>Paused
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted">
                                <?php echo e($form->last_submission_at ? $form->last_submission_at->diffForHumans() : 'Never'); ?>

                            </td>
                            <td class="text-right">
                                <a href="<?php echo e(route('dashboard.forms.show', $form->id)); ?>"
                                   class="btn btn-ghost btn-sm">View</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/dashboard/index.blade.php ENDPATH**/ ?>