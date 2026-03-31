

<?php $__env->startSection('title', 'Payment History - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .ph-header {
        margin-bottom: 2rem;
    }

    .ph-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin-bottom: 0.3rem;
    }

    .ph-header p {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    /* ── STATS ROW ── */
    .ph-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1rem;
        margin-bottom: 1.75rem;
    }

    .ph-stat {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        padding: 1.25rem;
    }

    .ph-stat-label {
        font-size: 0.7rem;
        font-family: var(--font-mono);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
    }

    .ph-stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        letter-spacing: -0.02em;
    }

    .ph-stat-value.green  { color: #00ff88; }
    .ph-stat-value.red    { color: #ff6b6b; }
    .ph-stat-value.amber  { color: #ffa500; }

    /* ── TABLE ── */
    .ph-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
    }

    .ph-card-title {
        font-size: 0.7rem;
        font-family: var(--font-mono);
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1.5rem;
    }

    .ph-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ph-table th {
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--text-muted);
        text-align: left;
        padding: 0 0 0.75rem;
        border-bottom: 1px solid var(--border-color);
    }

    .ph-table td {
        font-size: 0.875rem;
        color: var(--text-secondary);
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .ph-table tr:last-child td { border-bottom: none; }

    .ph-amount {
        font-family: var(--font-mono);
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.875rem;
    }

    .ph-txn-id {
        font-family: var(--font-mono);
        font-size: 0.7rem;
        color: var(--text-muted);
    }

    /* ── STATUS BADGES ── */
    .ph-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.25rem 0.7rem;
        border-radius: 100px;
    }

    .ph-badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .ph-badge.completed    { background: rgba(0,255,136,0.12); color: #00ff88;   border: 1px solid rgba(0,255,136,0.25); }
    .ph-badge.completed    .ph-badge-dot { background: #00ff88; }
    .ph-badge.success    { background: rgba(0,255,136,0.12); color: #00ff88;   border: 1px solid rgba(0,255,136,0.25); }
    .ph-badge.success    .ph-badge-dot { background: #00ff88; }
    .ph-badge.failed     { background: rgba(255,68,68,0.12);  color: #ff6b6b;  border: 1px solid rgba(255,68,68,0.25); }
    .ph-badge.failed     .ph-badge-dot { background: #ff6b6b; }
    .ph-badge.incomplete { background: rgba(255,165,0,0.12);  color: #ffa500;  border: 1px solid rgba(255,165,0,0.25); }
    .ph-badge.incomplete .ph-badge-dot { background: #ffa500; }
    .ph-badge.abandoned  { background: rgba(150,150,150,0.12);color: var(--text-muted); border: 1px solid var(--border-color); }
    .ph-badge.abandoned  .ph-badge-dot { background: var(--text-muted); }
    .ph-badge.unknown    { background: rgba(150,150,150,0.12);color: var(--text-muted); border: 1px solid var(--border-color); }

    .ph-error {
        font-size: 0.75rem;
        color: #ff6b6b;
        margin-top: 0.2rem;
    }

    /* ── INVOICE LINK ── */
    .ph-invoice-link {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.8rem;
        color: var(--text-muted);
        text-decoration: none;
        padding: 0.3rem 0.6rem;
        border-radius: 6px;
        border: 1px solid var(--border-color);
        transition: all 0.15s ease;
        font-family: var(--font-mono);
    }

    .ph-invoice-link:hover { border-color: var(--accent); color: var(--accent); }

    .ph-no-invoice {
        color: var(--text-muted);
        font-size: 0.8rem;
    }

    /* ── EMPTY STATE ── */
    .ph-empty {
        text-align: center;
        padding: 3rem;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .ph-table th:nth-child(4),
        .ph-table td:nth-child(4) { display: none; }
    }
</style>

<div class="ph-header">
    <h1>Payment History</h1>
    <p>All payment attempts for your account — successful, failed and incomplete.</p>
</div>

<?php
    $Completed  = collect($transactions)->where('status_type', 'success')->count();
    $successful  = collect($transactions)->where('status_type', 'success')->count();
    $failed      = collect($transactions)->where('status_type', 'failed')->count();
    $incomplete  = collect($transactions)->whereIn('status_type', ['incomplete', 'abandoned'])->count();
    $totalPaid   = collect($transactions)->where('status_type', 'success')->sum(function($t) {
        return 0; // amounts are formatted strings — just show count
    });
?>


<div class="ph-stats">
    <div class="ph-stat">
        <div class="ph-stat-label">Total Transactions</div>
        <div class="ph-stat-value"><?php echo e(count($transactions)); ?></div>
    </div>
    <div class="ph-stat">
        <div class="ph-stat-label">Successful</div>
        <div class="ph-stat-value green"><?php echo e($successful); ?></div>
    </div>
    <div class="ph-stat">
        <div class="ph-stat-label">Failed</div>
        <div class="ph-stat-value red"><?php echo e($failed); ?></div>
    </div>
    <div class="ph-stat">
        <div class="ph-stat-label">Incomplete</div>
        <div class="ph-stat-value amber"><?php echo e($incomplete); ?></div>
    </div>
</div>


<div class="ph-card">
    <div class="ph-card-title">All Transactions</div>

    <?php if(count($transactions) > 0): ?>
        <table class="ph-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Plan</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($txn['date']); ?></td>
                        <td><?php echo e($txn['plan']); ?></td>
                        <td>
                            <span class="ph-amount"><?php echo e($txn['amount']); ?></span>
                        </td>
                        <td>
                            <span class="ph-txn-id"><?php echo e($txn['txn_id']); ?></span>
                        </td>
                        <td>
                            <div>
                                <span class="ph-badge <?php echo e($txn['status_type']); ?>">
                                    <span class="ph-badge-dot"></span>
                                    <?php echo e($txn['status']); ?>

                                </span>
                                <?php if($txn['error']): ?>
                                    <div class="ph-error"><?php echo e($txn['error']); ?></div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <?php if($txn['status_type'] === 'success'): ?>
                                <a href="<?php echo e(route('billing.invoice-pdf', $txn['txn_id'])); ?>"
                                   class="ph-invoice-link"
                                   target="_blank">
                                    ↓ PDF
                                </a>
                            <?php else: ?>
                                <span class="ph-no-invoice">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="ph-empty">
            No payment history yet. Your transactions will appear here after your first payment.
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/billing/payment-history.blade.php ENDPATH**/ ?>