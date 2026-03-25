

<?php $__env->startSection('title', 'Express — No-Account Form Endpoint'); ?>

<?php $__env->startSection('content'); ?>
<div class="playground-wrapper">
    <div class="container">

        
        <div class="playground-header">
            <div class="express-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                No Account Needed
            </div>

            <h1 class="playground-title">Express</h1>
            <spam class="lp-dim">Instant form endpoints.</spam>
            <p class="playground-subtitle">
                Verify your email, point your form at the endpoint, and submissions land straight in your inbox — no account, no setup.
            </p>
        </div>

        
        <div class="playground-main">

            
            <div class="panel editor-panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8z"/>
                        </svg>
                        Code Editor
                    </div>
                    <div class="editor-tabs">
                        <button class="tab-btn active" data-tab="code">HTML</button>
                        <button class="tab-btn" data-tab="css">CSS</button>
                    </div>
                </div>

                
                <div class="tab-content active" id="tab-code">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#f97316;"></span>
                            <span class="editor-lang">HTML</span>
                        </div>
                        <button class="copy-btn" id="copyHtml">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                            </svg>
                            Copy HTML
                        </button>
                    </div>
                    <textarea id="htmlEditor" class="code-editor" spellcheck="false">&lt;form action="<?php echo e(config('app.url')); ?>/f/YOUR@EMAIL.COM" method="POST"&gt;
    &lt;input type="text" name="name" placeholder="Your name" required&gt;
    &lt;input type="email" name="email" placeholder="Your email" required&gt;
    &lt;textarea name="message" placeholder="Your message" required&gt;&lt;/textarea&gt;

    &lt;input type="hidden" name="_captcha" value="false"&gt;

    &lt;button type="submit"&gt;Send Message&lt;/button&gt;
&lt;/form&gt;</textarea>
                </div>

                
                <div class="tab-content" id="tab-css">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#60a5fa;"></span>
                            <span class="editor-lang">CSS</span>
                        </div>
                        <button class="copy-btn" id="copyCss">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                            </svg>
                            Copy CSS
                        </button>
                    </div>
                    <textarea id="cssEditor" class="code-editor" spellcheck="false">form {
    max-width: 500px;
    margin: 0 auto;
    font-family: sans-serif;
}

input, textarea {
    width: 100%;
    margin-bottom: 1rem;
    border: 1px solid #2d2d2d;
    border-radius: 6px;
    background: #1a1a1a;
    color: #ffffff;
    font-size: 0.8rem;
    transition: border-color 0.2s;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96,165,250,0.12);
}

button[type="submit"] {
    width: 100%;
    padding: 0.75rem;
    background: #3b82f6;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

button[type="submit"]:hover {
    background: #2563eb;
    transform: translateY(-1px);
}</textarea>
                </div>

                
                <div class="endpoint-tip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <span>Your form's <code>action</code> URL is your endpoint — replace <code>YOUR@EMAIL.COM</code> with your verified email.</span>
                </div>
            </div>

            
            <div class="panel preview-panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                        Live Preview
                    </div>
                    <div class="preview-live-dot">
                        <span class="live-dot"></span> Live
                    </div>
                </div>

                <div class="preview-body">

                    
                    <div class="config-section">
                        <div class="config-section-header">
                            <span class="config-step-num">1</span>
                            <div>
                                <div class="config-section-title">Verify your email</div>
                                <div class="config-section-desc">We'll route form submissions here. One-time verification, no account needed.</div>
                            </div>
                        </div>

                        <div class="email-row">
                            <input type="email" id="recipientEmail" class="email-input" placeholder="your@email.com" value="">
                            <button class="verify-btn" id="verifyEmailBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg>
                                Verify Email
                            </button>
                        </div>
                        <div id="emailStatus" class="email-status"></div>

                        
                        <div class="notice-box notice-neutral">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            <div>
                                <strong>CAPTCHA is currently disabled</strong> via the hidden field in the HTML tab. To re-enable spam protection, remove this line from your form:<br>
                                <code>&lt;input type="hidden" name="_captcha" value="false"&gt;</code>
                            </div>
                        </div>
                    </div>

                    
                    <div class="config-section">
                        <div class="config-section-header">
                            <span class="config-step-num">2</span>
                            <div>
                                <div class="config-section-title">Test your form</div>
                                <div class="config-section-desc">Fill and submit below — we'll process it and deliver it to your verified inbox.</div>
                            </div>
                        </div>

                        <div id="formPreview" class="preview-content"></div>
                        <div id="responseMessage" class="response-message"></div>
                    </div>

                </div>
            </div>
        </div>

        
        <div class="limitation-banner">
            <div class="limitation-banner-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16" style="flex-shrink:0;margin-top:2px;">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                </svg>
                <span><strong>Express has no submission history.</strong> Emails only go to your inbox — there's no dashboard to review or export past entries.</span>
            </div>
            <a href="<?php echo e(route('signup')); ?>" class="limitation-cta">
                Create a free account to unlock submission tracking
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>

        
        <div class="how-it-works-panel">
            <div class="how-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                How Express works
            </div>
            <div class="how-steps">
                <div class="how-step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Verify your email</strong>
                        <p>Enter an email and click Verify. We send a one-time confirmation link — click it to activate your endpoint.</p>
                    </div>
                </div>
                <div class="how-step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8z"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Point your form at the endpoint</strong>
                        <p>Set your form's <code>action</code> to <code><?php echo e(config('app.url')); ?>/f/your@email.com</code>. That's all the backend you need.</p>
                    </div>
                </div>
                <div class="how-step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <strong>CAPTCHA runs after submission</strong>
                        <p>After a visitor submits, they're briefly redirected to a CAPTCHA check. Disable it any time with the hidden field in the HTML.</p>
                    </div>
                </div>
                <div class="how-step">
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.11-2.278-.038-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>
                    </div>
                    <div>
                        <strong>Submissions arrive in your inbox</strong>
                        <p>Every entry is formatted and emailed directly to you. No dashboard, no login — just your inbox. Need history? <a href="<?php echo e(route('signup')); ?>" style="color:var(--pg-accent);">Create a free account.</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="toast" class="toast"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ============================================
   Express Page — Light Blue Accent Theme
   ============================================ */
:root {
    --pg-accent:        #3b82f6;
    --pg-accent-light:  #60a5fa;
    --pg-accent-glow:   rgba(59,130,246,0.10);
    --pg-accent-border: rgba(59,130,246,0.22);
}

.lp-dim {
    color: rgba(96, 165, 250, 0.5);
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: -0.03em;
    line-height: 1.1;
}

.playground-wrapper {
    background: var(--bg-primary);
    min-height: calc(100vh - 64px);
    padding: 3rem 0 5rem;
}

/* ---- Header ---- */
.playground-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.express-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.3rem 0.9rem;
    background: var(--pg-accent-glow);
    border: 1px solid var(--pg-accent-border);
    border-radius: 100px;
    font-size: 0.72rem;
    color: var(--pg-accent-light);
    font-family: var(--font-mono);
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 1rem;
}

.playground-title {
    font-size: clamp(2.4rem, 5vw, 3.5rem);
    font-weight: 700;
    color: var(--pg-accent);
    letter-spacing: -0.03em;
    line-height: 1.1;
}

.playground-subtitle {
    font-size: 1rem;
    color: var(--text-secondary);
    max-width: 480px;
    margin: 1rem auto;
    line-height: 1.65;
}

/* ---- Two-column grid — equal height ---- */
.playground-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1rem;
    /* default align-items:stretch makes both panels same height */
}

/* ---- Shared panel shell ---- */
.panel {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: border-color 0.2s;
}

.panel:hover { border-color: var(--pg-accent-border); }

.panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.9rem 1.25rem;
    background: var(--bg-tertiary);
    border-bottom: 1px solid var(--border-color);
    flex-shrink: 0;
}

.panel-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--text-primary);
}

.panel-title svg { color: var(--pg-accent); }

/* ---- Editor tabs ---- */
.editor-tabs {
    display: flex;
    gap: 0.2rem;
    background: var(--bg-primary);
    border-radius: 6px;
    padding: 3px;
}

.tab-btn {
    padding: 0.28rem 0.9rem;
    font-size: 0.78rem;
    font-weight: 500;
    color: var(--text-muted);
    background: transparent;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: var(--font-mono);
    transition: all 0.15s;
}

.tab-btn:hover { color: var(--text-secondary); }
.tab-btn.active { background: var(--bg-tertiary); color: var(--pg-accent-light); }

/* ---- Tab content ---- */
.tab-content        { display: none; flex-direction: column; flex: 1; }
.tab-content.active { display: flex; }

/* ---- Editor toolbar ---- */
.editor-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.45rem 1rem;
    background: var(--bg-secondary);
    border-bottom: 1px solid var(--border-color);
    flex-shrink: 0;
}

.editor-toolbar-left { display: flex; align-items: center; gap: 0.5rem; }

.editor-lang-dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }

.editor-lang {
    font-family: var(--font-mono);
    font-size: 0.68rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.07em;
}

.copy-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.28rem 0.7rem;
    background: var(--bg-tertiary);
    border: 1px solid var(--border-color);
    border-radius: 5px;
    color: var(--text-muted);
    font-size: 0.75rem;
    font-family: var(--font-mono);
    cursor: pointer;
    transition: all 0.15s;
}

.copy-btn:hover  { color: var(--pg-accent-light); border-color: var(--pg-accent-border); }
.copy-btn.copied { color: #34d399; border-color: rgba(52,211,153,0.3); }

/* ---- Code textarea — flex:1 fills panel height ---- */
.code-editor {
    flex: 1;
    width: 100%;
    min-height: 0;
    font-family: var(--font-mono);
    font-size: 12.5px;
    line-height: 1.7;
    padding: 1.1rem 1.25rem;
    background: var(--bg-primary);
    color: var(--text-secondary);
    border: none;
    resize: none;
    outline: none;
    white-space: pre;
    overflow: auto;
    tab-size: 2;
}

.code-editor:focus { color: var(--text-primary); }

/* ---- Endpoint tip — pinned to left panel bottom ---- */
.endpoint-tip {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    padding: 0.75rem 1.25rem;
    background: var(--pg-accent-glow);
    border-top: 1px solid var(--pg-accent-border);
    font-size: 0.79rem;
    color: var(--pg-accent-light);
    line-height: 1.5;
    flex-shrink: 0;
}

.endpoint-tip svg { flex-shrink: 0; margin-top: 1px; }

.endpoint-tip code {
    background: rgba(59,130,246,0.15);
    padding: 0.05rem 0.35rem;
    border-radius: 3px;
    font-size: 0.72rem;
}

/* ---- Right panel live dot ---- */
.preview-live-dot {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.72rem;
    color: var(--text-muted);
    font-family: var(--font-mono);
}

.live-dot {
    width: 7px; height: 7px;
    background: var(--pg-accent);
    border-radius: 50%;
    animation: pulse-blue 2s infinite;
}

@keyframes pulse-blue {
    0%,100% { opacity:1; box-shadow:0 0 0 0 var(--pg-accent-glow); }
    50%      { opacity:.7; box-shadow:0 0 0 5px transparent; }
}

/* ---- Preview body fills remaining right-panel height ---- */
.preview-body {
    padding: 1.25rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1.1rem;
    overflow-y: auto;
}

/* ---- Config sections ---- */
.config-section { display: flex; flex-direction: column; gap: 0.8rem; }

.config-section-header { display: flex; align-items: flex-start; gap: 0.75rem; }

.config-step-num {
    flex-shrink: 0;
    width: 22px; height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--pg-accent);
    color: #fff;
    font-size: 0.7rem;
    font-weight: 700;
    border-radius: 50%;
    font-family: var(--font-mono);
    margin-top: 1px;
}

.config-section-title { font-size: 0.88rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.1rem; }
.config-section-desc  { font-size: 0.78rem; color: var(--text-muted); line-height: 1.5; }

/* ---- Email row ---- */
.email-row { display: flex; gap: 0.5rem; }

.email-input {
    flex: 1;
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 7px;
    padding: 0.6rem 0.9rem;
    color: var(--text-primary);
    font-size: 0.88rem;
    font-family: var(--font-mono);
    transition: all 0.2s;
    min-width: 0;
}

.email-input:focus { outline: none; border-color: var(--pg-accent); box-shadow: 0 0 0 3px var(--pg-accent-glow); }
.email-input::placeholder { color: var(--text-muted); }

.verify-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.6rem 1.1rem;
    background: var(--pg-accent);
    color: #fff;
    border: none;
    border-radius: 7px;
    font-weight: 600;
    font-size: 0.83rem;
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.2s;
    font-family: var(--font-display);
    flex-shrink: 0;
}

.verify-btn:hover    { background: #2563eb; transform: translateY(-1px); }
.verify-btn:disabled { opacity: 0.55; cursor: not-allowed; transform: none; }

.email-status           { font-size: 0.79rem; min-height: 1rem; line-height: 1.5; }
.email-status.verified  { color: #34d399; }
.email-status.pending   { color: #fbbf24; }
.email-status.error     { color: #f87171; }

/* ---- Notice box ---- */
.notice-box {
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
    padding: 0.85rem 1rem;
    border-radius: 8px;
    font-size: 0.78rem;
    line-height: 1.55;
}

.notice-neutral {
    background: var(--pg-accent-glow);
    border: 1px solid var(--pg-accent-border);
    color: var(--text-muted);
}

.notice-neutral strong { color: var(--text-secondary); }

.notice-neutral code {
    display: inline-block;
    margin-top: 0.3rem;
    background: rgba(59,130,246,0.12);
    padding: 0.12rem 0.4rem;
    border-radius: 3px;
    font-size: 0.72rem;
    color: var(--pg-accent-light);
    word-break: break-all;
}

/* ---- Form preview area ---- */
.preview-content {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 1.1rem;
    min-height: 200px;
}

.preview-content form { max-width: 100%; }

.preview-content input,
.preview-content textarea {
    width: 100%;
    padding: 0.6rem 0.85rem;
    margin-bottom: 0.8rem;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    background: var(--bg-tertiary);
    color: var(--text-primary);
    font-size: 0.88rem;
    transition: all 0.2s;
    box-sizing: border-box;
}

.preview-content input:focus,
.preview-content textarea:focus {
    outline: none;
    border-color: var(--pg-accent);
    box-shadow: 0 0 0 3px var(--pg-accent-glow);
}

.preview-content button[type="submit"] {
    width: 100%;
    padding: 0.7rem 1.25rem;
    background: var(--pg-accent);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.preview-content button[type="submit"]:hover    { background: #2563eb; transform: translateY(-1px); }
.preview-content button[type="submit"]:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

.preview-content button[type="submit"].loading { position: relative; color: transparent; }

.preview-content button[type="submit"].loading::after {
    content: '';
    position: absolute;
    width: 1rem; height: 1rem;
    top: 50%; left: 50%;
    margin: -0.5rem 0 0 -0.5rem;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.6s linear infinite;
}

@keyframes spin { to { transform: rotate(360deg); } }

/* ---- Response message ---- */
.response-message         { display: none; padding: 0.8rem 1rem; border-radius: 8px; font-size: 0.84rem; line-height: 1.5; }
.response-message.show    { display: block; }
.response-message.success { background: rgba(52,211,153,0.08); border: 1px solid rgba(52,211,153,0.2); color: #34d399; }
.response-message.error   { background: rgba(248,113,113,0.08); border: 1px solid rgba(248,113,113,0.2); color: #f87171; }
.response-message.info    { background: var(--pg-accent-glow); border: 1px solid var(--pg-accent-border); color: var(--pg-accent-light); }

/* ====================================================
   Limitation banner — full width, sits BELOW both panels
   ==================================================== */
.limitation-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    padding: 1rem 1.5rem;
    margin-bottom: 2.5rem;
    margin-top: 2.5rem;
    background: rgba(251,191,36,0.05);
    border: 1px solid rgba(251,191,36,0.18);
    border-radius: 10px;
}

.limitation-banner-left {
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
    font-size: 0.85rem;
    color: var(--text-muted);
    line-height: 1.5;
}

.limitation-banner-left svg     { color: #fbbf24; }
.limitation-banner-left strong  { color: var(--text-secondary); }

.limitation-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.55rem 1.15rem;
    background: var(--pg-accent);
    color: #fff;
    text-decoration: none;
    border-radius: 7px;
    font-size: 0.83rem;
    font-weight: 600;
    white-space: nowrap;
    flex-shrink: 0;
    transition: all 0.2s;
}

.limitation-cta:hover { background: #2563eb; transform: translateY(-1px); }

/* ---- How it works ---- */
.how-it-works-panel {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem 1.75rem;
}

.how-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--text-primary);
    margin-bottom: 1.25rem;
}

.how-header svg { color: var(--pg-accent); }

.how-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
    gap: 1.25rem;
}

.how-step {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    font-size: 0.82rem;
    color: var(--text-muted);
    line-height: 1.55;
}

.step-icon {
    flex-shrink: 0;
    width: 28px; height: 28px;
    background: var(--pg-accent-glow);
    border: 1px solid var(--pg-accent-border);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--pg-accent-light);
    margin-top: 1px;
}

.how-step strong { display: block; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.2rem; }
.how-step p      { margin: 0; }

.how-step code {
    background: var(--bg-tertiary);
    padding: 0.05rem 0.35rem;
    border-radius: 3px;
    font-size: 0.72rem;
    font-family: var(--font-mono);
    color: var(--text-secondary);
}

/* ---- Toast ---- */
.toast {
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%) translateY(20px);
    background: var(--bg-tertiary);
    border: 1px solid var(--pg-accent-border);
    color: var(--text-primary);
    padding: 0.65rem 1.4rem;
    border-radius: 8px;
    font-size: 0.82rem;
    font-family: var(--font-mono);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s;
    z-index: 9999;
    white-space: nowrap;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

/* ---- Responsive ---- */
@media (max-width: 900px) {
    .playground-main   { grid-template-columns: 1fr; }
    .how-steps         { grid-template-columns: 1fr 1fr; }
    .limitation-banner { flex-direction: column; align-items: flex-start; }
    .limitation-cta    { align-self: stretch; justify-content: center; }
}

@media (max-width: 560px) {
    .how-steps          { grid-template-columns: 1fr; }
    .playground-title   { font-size: 2.2rem; }
    .email-row          { flex-direction: column; }
    .verify-btn         { width: 100%; justify-content: center; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const htmlEditor     = document.getElementById('htmlEditor');
    const cssEditor      = document.getElementById('cssEditor');
    const formPreview    = document.getElementById('formPreview');
    const responseDiv    = document.getElementById('responseMessage');
    const recipientEmail = document.getElementById('recipientEmail');
    const verifyBtn      = document.getElementById('verifyEmailBtn');
    const emailStatus    = document.getElementById('emailStatus');
    const toast          = document.getElementById('toast');
    const copyHtmlBtn    = document.getElementById('copyHtml');
    const copyCssBtn     = document.getElementById('copyCss');

    let isVerified    = false;
    let injectedStyle = null;
    let verifiedEmail = localStorage.getItem('playground_verified_email') || '';

    /* ---- Copy buttons ---- */
    function setupCopy(btn, getContent) {
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(getContent()).then(() => {
                const orig = btn.innerHTML;
                btn.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
                btn.classList.add('copied');
                setTimeout(() => { btn.innerHTML = orig; btn.classList.remove('copied'); }, 2000);
            }).catch(() => showToast('Failed to copy'));
        });
    }

    setupCopy(copyHtmlBtn, () => htmlEditor.value);
    setupCopy(copyCssBtn,  () => cssEditor.value);

    /* ---- Tab switching ---- */
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const tab = btn.dataset.tab;
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('tab-' + tab).classList.add('active');
        });
    });

    /* ---- Live preview ---- */
    function decodeHtml(html) {
        const t = document.createElement('textarea');
        t.innerHTML = html;
        return t.value;
    }

    function injectCss(css) {
        if (injectedStyle) injectedStyle.remove();
        try {
            const scoped = css.replace(/(^|\})\s*([^{@][^{]*)\{/g, (match, closing, selector) => {
                const scopedSelector = selector.split(',').map(s => '.preview-content ' + s.trim()).join(', ');
                return (closing || '') + ' ' + scopedSelector + ' {';
            });
            injectedStyle = document.createElement('style');
            injectedStyle.id = 'playground-user-css';
            injectedStyle.textContent = scoped;
            document.head.appendChild(injectedStyle);
        } catch(e) {}
    }

    function updatePreview() {
        formPreview.innerHTML = decodeHtml(htmlEditor.value);
        injectCss(cssEditor.value);
        attachFormHandler();
    }

    let previewTimer;
    function scheduleUpdate() {
        clearTimeout(previewTimer);
        previewTimer = setTimeout(updatePreview, 250);
    }

    htmlEditor.addEventListener('input', scheduleUpdate);
    cssEditor.addEventListener('input', scheduleUpdate);
    updatePreview();

    /* ---- Email helpers ---- */
    function updateHtmlCodeWithEmail(email) {
        const actionRegex = /(action=["'].*\/f\/)([^"']+)(["'])/;
        if (actionRegex.test(htmlEditor.value)) {
            htmlEditor.value = htmlEditor.value.replace(actionRegex, `$1${email}$3`);
            scheduleUpdate();
        }
    }

    function checkEmailVerification(email) {
        return fetch('<?php echo e(route("playground.check-verified")); ?>?email=' + encodeURIComponent(email), {
            headers: { 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            if (data.verified) {
                isVerified    = true;
                verifiedEmail = email;
                localStorage.setItem('playground_verified_email', email);
                setEmailStatus('✅ Email verified — submissions to this address are active.', 'verified');
                verifyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/></svg> Verified';
                verifyBtn.style.background = '#059669';
                verifyBtn.disabled = false;
                updateHtmlCodeWithEmail(email);
            } else {
                isVerified = false;
            }
            return data.verified;
        })
        .catch(() => { isVerified = false; return false; });
    }

    function setEmailStatus(msg, type) {
        emailStatus.textContent = msg;
        emailStatus.className   = 'email-status' + (type ? ' ' + type : '');
    }

    function pollVerification(email) {
        let attempts = 0;
        if (window.verificationInterval) clearInterval(window.verificationInterval);
        window.verificationInterval = setInterval(() => {
            if (++attempts > 40) {
                clearInterval(window.verificationInterval);
                setEmailStatus('Verification timed out. Please try again.', 'error');
                verifyBtn.disabled = false;
                verifyBtn.innerHTML = 'Verify Email';
                return;
            }
            checkEmailVerification(email).then(v => { if (v) clearInterval(window.verificationInterval); });
        }, 3000);
    }

    verifyBtn.addEventListener('click', () => {
        const email   = recipientEmail.value.trim();
        const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email)              { setEmailStatus('Please enter an email address.', 'error'); recipientEmail.focus(); return; }
        if (!emailRx.test(email)){ setEmailStatus('Enter a valid email address.', 'error');   recipientEmail.focus(); return; }

        updateHtmlCodeWithEmail(email);
        verifyBtn.disabled  = true;
        verifyBtn.innerHTML = 'Sending…';
        setEmailStatus('', '');

        fetch('<?php echo e(route("playground.verify")); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>', 'Accept': 'application/json' },
            body: JSON.stringify({ email })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                setEmailStatus(`📬 Verification email sent to ${email}. Check your inbox and click the link.`, 'pending');
                pollVerification(email);
            } else {
                setEmailStatus(data.message || 'Failed to send verification.', 'error');
                verifyBtn.disabled  = false;
                verifyBtn.innerHTML = 'Verify Email';
            }
        })
        .catch(() => {
            setEmailStatus('Network error. Please try again.', 'error');
            verifyBtn.disabled  = false;
            verifyBtn.innerHTML = 'Verify Email';
        });
    });

    recipientEmail.addEventListener('input', function () {
        if (this.value.trim().includes('@')) updateHtmlCodeWithEmail(this.value.trim());
    });

    recipientEmail.addEventListener('blur', function () {
        if (this.value.trim().includes('@')) checkEmailVerification(this.value.trim());
    });

    /* ---- Form submit handler ---- */
    function resolveRecipientEmail(form) {
        const match = (form.getAttribute('action') || '').match(/\/f\/([^\s/?#]+@[^\s/?#]+\.[^\s/?#]+)/i);
        if (match) return decodeURIComponent(match[1]);
        const ei = form.querySelector('input[type="email"]');
        if (ei && ei.value) return ei.value;
        return recipientEmail.value.trim() || null;
    }

    function handleSubmit(e) {
        e.preventDefault();
        const form        = e.target;
        const emailRx     = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const targetEmail = resolveRecipientEmail(form);

        if (!targetEmail || !emailRx.test(targetEmail)) {
            showResponse('⚠️ No valid recipient email. Set the form <code>action="/f/your@email.com"</code> or verify an email above.', 'error');
            return;
        }

        const submitBtn = form.querySelector('[type="submit"]');
        if (submitBtn) { submitBtn.classList.add('loading'); submitBtn.disabled = true; }
        responseDiv.className = 'response-message';

        checkEmailVerification(targetEmail).then(verified => {
            if (!verified) {
                showResponse(`⚠️ <strong>${targetEmail}</strong> hasn't been verified yet. Enter it above and click Verify.`, 'error');
                recipientEmail.value = targetEmail;
                recipientEmail.focus();
                if (submitBtn) { submitBtn.classList.remove('loading'); submitBtn.disabled = false; }
                return;
            }

            const formData = new FormData(form);
            formData.append('_token', '<?php echo e(csrf_token()); ?>');
            formData.append('recipient_email', targetEmail);
            formData.append('from_playground', 'true');

            fetch('<?php echo e(route("playground.submit")); ?>', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                body: formData
            })
            .then(async r => {
                const data = await r.json();
                if (data.redirect) {
                    showResponse('🔄 Redirecting to CAPTCHA verification…', 'info');
                    setTimeout(() => { window.location.href = data.redirect; }, 1000);
                    return;
                }
                if (!r.ok) throw new Error(data.message || 'Submission failed');
                if (data.success) {
                    showResponse(`✅ Submission delivered to <strong>${targetEmail}</strong>`, 'success');
                    form.reset();
                    showToast('Form submitted!');
                } else {
                    showResponse(data.message || 'An error occurred.', 'error');
                }
            })
            .catch(err => showResponse(err.message || 'Network error. Please try again.', 'error'))
            .finally(() => { if (submitBtn) { submitBtn.classList.remove('loading'); submitBtn.disabled = false; } });
        });
    }

    function attachFormHandler() {
        formPreview.querySelectorAll('form').forEach(form => {
            form.removeEventListener('submit', handleSubmit);
            form.addEventListener('submit', handleSubmit);
        });
    }

    /* ---- UI helpers ---- */
    function showResponse(msg, type) {
        responseDiv.innerHTML = msg;
        responseDiv.className = 'response-message show ' + type;
        if (type === 'success') setTimeout(() => responseDiv.classList.remove('show'), 5000);
    }

    function showToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    /* ---- Init ---- */
    if (verifiedEmail) {
        recipientEmail.value = verifiedEmail;
        checkEmailVerification(verifiedEmail);
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/pages/playground.blade.php ENDPATH**/ ?>