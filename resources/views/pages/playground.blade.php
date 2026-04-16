@extends('layouts.express')

@section('title', 'Express- 000form')

@section('content')

<!-- ===================== PAGE ===================== -->
<div class="page">

    <!-- HERO -->
    <section class="hero">
        <div class="hero-badge">
            <span class="hero-tag-dot"></span>
            No account needed
        </div>

        <h1 class="hero-title">Express</h1>
        <span class="hero-subtitle-em">Instant form endpoints.</span>

        <p class="hero-desc">
            Verify your email, point your form at the endpoint, and submissions land straight in your inbox — no account, no setup, no server required.
        </p>

        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-value">0</div>
                <div class="stat-label">Lines of backend</div>
            </div>
            <div class="stat-sep"></div>
            <div class="stat-item">
                <div class="stat-value">&lt;60s</div>
                <div class="stat-label">Setup time</div>
            </div>
            <div class="stat-sep"></div>
            <div class="stat-item">
                <div class="stat-value">Free</div>
                <div class="stat-label">Forever</div>
            </div>
        </div>
    </section>

    <!-- PLAYGROUND -->
    <section class="playground-section">

        <div class="playground-section-header">
            <div class="section-label">
                <span class="dot"></span>
                Live Express
            </div>
            <h2 class="section-title">Try it <span>right now</span></h2>
            <p class="section-desc">Edit the code on the left, verify your email on the right, and submit a real test — it will land in your inbox.</p>
        </div>

        <!-- TWO PANELS -->
        <div class="panels-grid" id="play-area">

            <!-- LEFT PANEL — Code Editor -->
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

                <!-- HTML Tab -->
                <div class="tab-content active" id="tab-code">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#f97316;"></span>
                            <span class="editor-lang">HTML</span>
                        </div>
                        <button class="copy-btn" id="copyHtml">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                            </svg>
                            Copy HTML
                        </button>
                    </div>
                    <textarea id="htmlEditor" class="code-editor" spellcheck="false">&lt;form action="{{ config('app.url') }}/f/YOUR@EMAIL.COM" method="POST"&gt;
    &lt;input type="text" name="name" placeholder="Your name" required&gt;
    &lt;input type="email" name="email" placeholder="Your email" required&gt;
    &lt;textarea name="message" placeholder="Your message" required&gt;&lt;/textarea&gt;

    &lt;input type="hidden" name="_captcha" value="false"&gt;

    &lt;button type="submit"&gt;Send Message&lt;/button&gt;
&lt;/form&gt;</textarea>
                </div>

                <!-- CSS Tab -->
                <div class="tab-content" id="tab-css">
                    <div class="editor-toolbar">
                        <div class="editor-toolbar-left">
                            <span class="editor-lang-dot" style="background:#60a5fa;"></span>
                            <span class="editor-lang">CSS</span>
                        </div>
                        <button class="copy-btn" id="copyCss">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
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
    padding: 0.65rem 0.9rem;
    border: 1px solid #2d2d2d;
    border-radius: 6px;
    background: #1a1a1a;
    color: #ffffff;
    font-size: 0.85rem;
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
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: #ffffff;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

button[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 18px rgba(59,130,246,0.5);
}</textarea>
                </div>

                <!-- Endpoint tip -->
                <div class="endpoint-tip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <span>Your form's <code>action</code> URL is your endpoint — replace <code>YOUR@EMAIL.COM</code> with your verified email.</span>
                </div>
            </div>

            <!-- RIGHT PANEL — Live Preview -->
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

                    <!-- Step 1 -->
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

                    <!-- Step 2 -->
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

        

    </section>

    <!-- HOW IT WORKS -->
    <section class="hiw-section">
        <div class="hiw-panel">
            <div class="hiw-header">
                <div class="hiw-header-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                    </svg>
                    How Express works
                </div>
                <div class="section-label" style="margin:0;">
                    <span class="dot"></span>
                    4 simple steps
                </div>
            </div>

            <div class="hiw-steps">
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 01</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                    </div>
                    <strong>Verify your email</strong>
                    <p>Enter an email and click Verify. We send a one-time confirmation link — click it to activate your endpoint.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 02</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.854 4.854a.5.5 0 1 0-.708-.708l-3.5 3.5a.5.5 0 0 0 0 .708l3.5 3.5a.5.5 0 0 0 .708-.708L2.707 8zm4.292 0a.5.5 0 0 1 .708-.708l3.5 3.5a.5.5 0 0 1 0 .708l-3.5 3.5a.5.5 0 0 1-.708-.708L13.293 8z"/>
                        </svg>
                    </div>
                    <strong>Point your form</strong>
                    <p>Set your form's <code>action</code> to <code>/f/your@email.com</code>. That's all the backend you need.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 03</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        </svg>
                    </div>
                    <strong>CAPTCHA protection</strong>
                    <p>After a visitor submits, they're redirected to a quick CAPTCHA check. Disable it any time with the hidden field.</p>
                </div>
                <div class="hiw-step">
                    <div class="hiw-step-num">Step 04</div>
                    <div class="step-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.11-2.278-.038-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>
                    </div>
                    <strong>Land in your inbox</strong>
                    <p>Every entry is formatted and emailed directly to you. No login. 
                        <!-- Need history? <a href="{{ route('signup') }}" style="color:var(--blue-bright);">Create a free account.</a> -->
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LIMITATION BANNER -->
    <section class="hiw-section">
        <div class="limitation-banner">
            <div class="limitation-banner-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                </svg>
                <span>Express sends submissions directly to your inbox—no dashboard or history available.
                <strong>Use CORE to access history, spam filtering, and team features.</strong></span>
            </div>
            <a href="{{ route('signup') }}" class="limitation-cta">
                
                    <span class="pill-icon">
                        <svg width="11" height="13" viewBox="0 0 12 14" fill="none">
                            <path d="M7 1L2 7.5H6L5 13L10 6.5H6.5L7 1Z"
                                fill="#001a0d" stroke="rgba(0,0,0,0.2)"
                                stroke-width="0.5" stroke-linejoin="round"/>
                        </svg>
                    </span>
                Explore Core
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                </svg>
            </a>
        </div>
    </sectiion>

</div>

<!-- TOAST -->
<div id="toast" class="toast"></div>



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

    /* ---- Mobile menu ---- */
    const toggle  = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navLinks');
    if (toggle && navMenu) {
        toggle.addEventListener('click', () => navMenu.classList.toggle('open'));
    }

    /* ---- Copy buttons ---- */
    function setupCopy(btn, getContent) {
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(getContent()).then(() => {
                const orig = btn.innerHTML;
                btn.innerHTML = '<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
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
        return fetch('{{ route("playground.check-verified") }}?email=' + encodeURIComponent(email), {
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
                verifyBtn.style.background = 'linear-gradient(135deg,#059669 0%,#047857 100%)';
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

        fetch('{{ route("playground.verify") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
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
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('recipient_email', targetEmail);
            formData.append('from_playground', 'true');

            fetch('{{ route("playground.submit") }}', {
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
@endsection