

<?php $__env->startSection('title', 'Payment Successful - 000form'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .proc {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        padding: 2rem;
        font-family: var(--font-display);
        margin-top: 6rem
    }

    .proc-box {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        text-align: center;
        max-width: 520px;
        width: 100%;
        transition: all 0.3s ease;
    }

    /* ── LOADING STATE ── */
    .proc-spinner {
        width: 52px;
        height: 52px;
        border: 3px solid var(--border-color);
        border-top-color: var(--accent);
        border-radius: 50%;
        animation: spin 0.9s linear infinite;
        margin: 0 auto 1.75rem;
    }

    /* ── SUCCESS STATE ── */
    .proc-success-icon {
        display: none;
        width: 64px;
        height: 64px;
        background: rgba(0,255,136,0.12);
        border: 2px solid var(--accent);
        border-radius: 50%;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        margin: 0 auto 1.75rem;
        color: var(--accent);
    }

    .proc-box h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        letter-spacing: -0.02em;
    }

    .proc-box p {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 0.5rem;
    }

    /* ── PAYMENT DETAILS CARD ── */
    .proc-details {
        display: none;
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        border-radius: 14px;
        padding: 1.5rem;
        margin: 1.5rem 0;
        text-align: left;
    }

    .proc-details-title {
        font-size: 0.65rem;
        font-family: var(--font-mono);
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    .proc-detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--border-color);
        font-size: 0.875rem;
        gap: 1rem;
    }

    .proc-detail-row:last-child {
        border-bottom: none;
    }

    .proc-detail-label {
        color: var(--text-muted);
        font-size: 0.8rem;
        flex-shrink: 0;
    }

    .proc-detail-value {
        color: var(--text-primary);
        font-weight: 600;
        font-family: var(--font-mono);
        font-size: 0.75rem;
        text-align: right;
        word-break: break-all;
    }

    .proc-detail-value.accent {
        color: var(--accent);
    }

    /* ── BUTTONS ── */
    .proc-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.875rem 1.75rem;
        border-radius: 10px;
        font-family: var(--font-display);
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        margin: 0.4rem;
    }

    .proc-btn-primary {
        background: var(--accent);
        color: var(--bg-primary);
        display: none;
    }

    .proc-btn-primary:hover {
        opacity: 0.88;
        transform: translateY(-1px);
    }

    .proc-btn-outline {
        background: transparent;
        color: var(--text-primary);
        border: 1px solid var(--border-hover);
        display: none;
    }

    .proc-btn-outline:hover {
        border-color: var(--accent);
        color: var(--accent);
    }

    .proc-btn-invoice {
        border-radius: 8px;
        background: transparent;
        color: var(--accent);
        border: 1px solid rgba(0,255,136,0.35);
        display: none;
        font-size: 0.75rem;
        padding: 0.5rem 0.9rem;
    }

    .proc-btn-invoice:hover {
        background: rgba(0,255,136,0.08);
    }

    .proc-btn-fallback {
        display: none;
        background: var(--accent);
        color: var(--bg-primary);
    }

    /* ── DOTS ANIMATION ── */
    .proc-dots span {
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--accent);
        margin: 0 3px;
        animation: dotBounce 1.2s infinite ease-in-out;
        opacity: 0.4;
    }

    .proc-dots span:nth-child(1) { animation-delay: 0s; }
    .proc-dots span:nth-child(2) { animation-delay: 0.2s; }
    .proc-dots span:nth-child(3) { animation-delay: 0.4s; }

    @keyframes dotBounce {
        0%, 80%, 100% { opacity: 0.4; transform: scale(1); }
        40%            { opacity: 1;   transform: scale(1.3); }
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    @media (max-width: 480px) {
        .proc-box { padding: 2rem 1.5rem; }
    }
</style>

<div class="proc">
    <div class="proc-box">

        
        <div class="proc-spinner" id="proc-spinner"></div>

        
        <div class="proc-success-icon" id="proc-success">✓</div>

        <h2 id="proc-title">Processing your payment</h2>

        <p id="proc-msg">Please wait while we confirm your subscription.</p>

        <div class="proc-dots" id="proc-dots">
            <span></span><span></span><span></span>
        </div>

        
        <div class="proc-details" id="proc-details">
            <div class="proc-details-title">Payment Summary</div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Plan</span>
                <span class="proc-detail-value accent" id="detail-plan">—</span>
            </div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Billing</span>
                <span class="proc-detail-value" id="detail-billing">—</span>
            </div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Amount</span>
                <span class="proc-detail-value accent" id="detail-amount">—</span>
            </div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Access until</span>
                <span class="proc-detail-value" id="detail-period">—</span>
            </div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Subscription ID</span>
                <span class="proc-detail-value" id="detail-sub-id">—</span>
            </div>

            <div class="proc-detail-row">
                <span class="proc-detail-label">Transaction ID</span>
                <span class="proc-detail-value" id="detail-txn-id">—</span>
            </div>
            <div class="proc-detail-row">
                <span class="proc-detail-label">Download Invoice</span>
                <span class="proc-detail-value" id="detail-txn-id">
                    
                    <a href="#" class="proc-btn proc-btn-invoice" id="btn-invoice" target="_blank">
                        ↓ Download Invoice
                    </a>
                </span>
            </div>

        </div>

        
        <div style="margin-top:1rem;">
            <a href="<?php echo e(route('billing.portal')); ?>" class="proc-btn proc-btn-primary" id="btn-billing">
                View Plan Details →
            </a>
            <a href="<?php echo e(route('dashboard')); ?>" class="proc-btn proc-btn-outline" id="btn-dashboard">
                Go to Dashboard
            </a>
        </div>

        
        <a href="<?php echo e(route('billing.portal')); ?>" class="proc-btn proc-btn-fallback" id="btn-fallback">
            Go to Dashboard →
        </a>

    </div>
</div>

<script>
    (function () {
        let attempts = 0;
        const MAX = 15; // poll for up to 30 seconds

        // ── Read _ptxn from URL and pass it to every checkStatus poll ──
        // This is how we fetch real transaction data from Paddle API
        const urlParams = new URLSearchParams(window.location.search);
        const ptxn      = urlParams.get('_ptxn')
            || sessionStorage.getItem('paddle_txn_id')
            || '';
        if (sessionStorage.getItem('paddle_txn_id')) {
            sessionStorage.removeItem('paddle_txn_id');
        }

        async function checkStatus() {
            attempts++;

            try {
                const statusUrl = '<?php echo e(route('subscription.status')); ?>'
                    + (ptxn ? '?_ptxn=' + encodeURIComponent(ptxn) : '');

                const res  = await fetch(statusUrl, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                });

                const data = await res.json();

                if (data.activated) {
                    showSuccess(data);
                    return;
                }
            } catch (e) {
                console.log('Status check error:', e.message);
            }

            if (attempts >= MAX) {
                showTimeout();
                return;
            }

            setTimeout(checkStatus, 2000);
        }

        function showSuccess(data) {
            // Hide loading
            document.getElementById('proc-spinner').style.display = 'none';
            document.getElementById('proc-dots').style.display    = 'none';

            // Show success icon
            document.getElementById('proc-success').style.display = 'flex';

            // Update title and message
            document.getElementById('proc-title').textContent = 'Payment Successful!';
            document.getElementById('proc-msg').textContent   =
                'Your ' + (data.plan || 'plan') + ' subscription is now active.';

            // Fill payment details
            document.getElementById('detail-plan').textContent    = data.plan          || '—';
            document.getElementById('detail-billing').textContent = data.billing_cycle || '—';
            document.getElementById('detail-amount').textContent  = data.amount        || '—';
            document.getElementById('detail-period').textContent  = data.period_end    || '—';
            document.getElementById('detail-sub-id').textContent  = data.sub_id        || '—';
            document.getElementById('detail-txn-id').textContent  = data.txn_id        || '—';

            // Show details card
            document.getElementById('proc-details').style.display = 'block';

            // Show invoice download button if URL exists
            if (data.invoice_url) {
                const btnInvoice = document.getElementById('btn-invoice');
                btnInvoice.href          = data.invoice_url;
                btnInvoice.style.display = 'inline-flex';
            }

            // Show action buttons
            document.getElementById('btn-billing').style.display   = 'inline-flex';
            document.getElementById('btn-dashboard').style.display = 'inline-flex';

            // Success border
            document.querySelector('.proc-box').style.borderColor = 'var(--accent)';
            document.querySelector('.proc-box').style.boxShadow   = '0 20px 40px rgba(0,255,136,0.1)';
        }

        function showTimeout() {
            document.getElementById('proc-spinner').style.display = 'none';
            document.getElementById('proc-dots').style.display    = 'none';
            document.getElementById('proc-msg').textContent =
                'Your payment was received. Click below to view your plan.';
            document.getElementById('btn-fallback').style.display = 'inline-flex';
        }

        // Start polling immediately
        checkStatus();
    })();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/000form/resources/views/subscription/processing.blade.php ENDPATH**/ ?>