

<?php $__env->startSection('title', 'Scholarship Application Form - 000form Library'); ?>

<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('css/library.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/category.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/tenant-form.css')); ?>" rel="stylesheet">
<style>
    .form-preview-code {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: stretch;
        margin-bottom: 2rem;
    }

    .form-preview-card,
    .code-tabs-container {
        height: auto;
        display: flex;
        flex-direction: column;
    }

    .live-form-preview {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .preview-frame {
        flex: 1;
        overflow-y: auto;
        max-height: 600px;
    }

    .code-tabs-container {
        display: flex;
        flex-direction: column;
    }

    .code-tab-panel.active {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .code-block-wrapper {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .code-block-content {
        flex: 1;
        overflow-y: auto;
        max-height: 500px;
        min-height: 400px;
    }

    @media (max-width: 992px) {
        .form-preview-code {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .preview-frame {
            max-height: 500px;
        }
        
        .code-block-content {
            max-height: 400px;
            min-height: 300px;
        }
    }

    @media (max-width: 576px) {
        .form-preview-card {
            padding: 1rem;
        }
        
        .preview-frame {
            padding: 0.75rem;
        }
        
        .code-tabs {
            flex-direction: column;
        }
        
        .code-tab {
            width: 100%;
            text-align: center;
        }
        
        .code-block-header {
            flex-direction: column;
            gap: 0.75rem;
            align-items: flex-start;
        }
        
        .code-block-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.25rem;
        }
        
        .related-forms-grid {
            grid-template-columns: 1fr;
        }
        
        .instruction-card {
            flex-direction: column;
            gap: 1rem;
        }
    }

    .scholarship-form-preview {
        max-width: 100%;
        padding: 1.5rem;
        background: #0d0d0d;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
    }

    .scholarship-form-preview h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #fafafa;
        margin-bottom: 0.5rem;
    }

    .scholarship-form-preview .form-description {
        font-size: 0.9rem;
        color: #888888;
        margin-bottom: 1.5rem;
    }

    .scholarship-form-preview h4 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #00ff88;
        margin: 1.5rem 0 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px dashed #2a2a2a;
    }

    .scholarship-form-preview h4:first-of-type {
        margin-top: 0;
    }

    .scholarship-form-preview .form-group {
        margin-bottom: 1.25rem;
    }

    .scholarship-form-preview label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #e6edf3;
        margin-bottom: 0.5rem;
    }

    .scholarship-form-preview .form-input,
    .scholarship-form-preview .form-select,
    .scholarship-form-preview textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        background: #111111;
        border: 1px solid #1a1a1a;
        border-radius: 8px;
        color: #fafafa;
        font-size: 0.95rem;
        font-family: inherit;
    }

    .scholarship-form-preview textarea {
        min-height: 120px;
        resize: vertical;
    }

    .scholarship-form-preview .form-row {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .scholarship-form-preview .form-row .form-group {
        flex: 1;
        margin-bottom: 0;
    }

    .scholarship-form-preview .form-submit {
        width: 100%;
        padding: 0.75rem 1.5rem;
        background: var(--accent);
        border: none;
        border-radius: 8px;
        color: var(--bg-primary);
        font-size: 1rem;
        font-weight: 500;
        margin-top: 0.5rem;
        cursor: not-allowed;
        opacity: 0.9;
    }
    /* ============================================
    CRITICAL MOBILE FIXES - SCHOLARSHIP FORM
    ============================================ */

    /* Override the problematic column stacking for code tabs on mobile */
    @media (max-width: 576px) {
        /* Prevent code tabs from stacking vertically */
        .code-tabs {
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE/Edge */
            display: flex !important;
            gap: 0;
            border-bottom: 1px solid #2a2a2a;
        }
        
        .code-tabs::-webkit-scrollbar {
            display: none; /* Chrome/Safari */
        }
        
        .code-tab {
            width: auto !important;
            min-width: fit-content !important;
            flex-shrink: 0 !important;
            text-align: center !important;
            padding: 0.6rem 1rem !important;
            font-size: 0.78rem !important;
            white-space: nowrap !important;
            border-bottom: 2px solid transparent;
            transition: all 0.2s ease;
        }
        
        .code-tab.active {
            border-bottom-color: #00ff88;
        }
        
        /* Fix code block header - keep it horizontal */
        .code-block-header {
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 0.75rem !important;
            padding: 0.75rem 0.875rem !important;
            flex-wrap: nowrap !important;
        }
        
        .code-block-info {
            flex-direction: row !important;
            align-items: center !important;
            gap: 0.5rem !important;
            flex-shrink: 1;
            min-width: 0;
        }
        
        .code-block-language {
            flex-shrink: 0;
            font-size: 0.65rem !important;
            padding: 0.2rem 0.5rem !important;
        }
        
        .code-block-desc {
            font-size: 0.7rem !important;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .code-copy-btn {
            width: auto !important;
            flex-shrink: 0;
            white-space: nowrap;
            font-size: 0.7rem !important;
            padding: 0.4rem 0.75rem !important;
            min-width: fit-content !important;
        }
        
        /* Make code block content scrollable with better sizing */
        .code-block-content {
            max-height: 350px !important;
            min-height: 200px !important;
            padding: 0.75rem !important;
            overflow: auto !important;
            -webkit-overflow-scrolling: touch;
        }
        
        .code-block-content pre {
            font-size: 0.68rem !important;
            line-height: 1.5 !important;
            padding: 0 !important;
            margin: 0 !important;
            white-space: pre !important;
            word-wrap: normal !important;
            overflow-x: auto !important;
        }
    }

    /* Additional fixes for very small screens */
    @media (max-width: 380px) {
        .code-tab {
            padding: 0.5rem 0.75rem !important;
            font-size: 0.72rem !important;
        }
        
        .code-block-header {
            padding: 0.5rem 0.75rem !important;
            gap: 0.5rem !important;
        }
        
        .code-block-language {
            font-size: 0.6rem !important;
            padding: 0.15rem 0.4rem !important;
        }
        
        .code-block-desc {
            font-size: 0.65rem !important;
            max-width: 120px;
        }
        
        .code-copy-btn {
            font-size: 0.65rem !important;
            padding: 0.35rem 0.625rem !important;
        }
        
        .code-copy-btn svg {
            width: 12px;
            height: 12px;
        }
        
        .code-block-content pre {
            font-size: 0.62rem !important;
        }
    }

    /* Landscape mode - ensure code block doesn't take too much height */
    @media (max-width: 768px) and (orientation: landscape) {
        .code-block-content {
            max-height: 200px !important;
            min-height: 150px !important;
        }
    }

    /* Fix for the form preview card on mobile */
    @media (max-width: 576px) {
        .form-preview-card {
            padding: 0.5rem !important;
        }
        
        .form-preview-header {
            padding: 1rem 0.75rem !important;
        }
        
        .form-preview-header h2 {
            font-size: 1.1rem !important;
        }
        
        .form-preview-subtitle {
            font-size: 0.78rem !important;
        }
        
        .live-form-preview {
            padding: 0 0.5rem 1rem !important;
        }
        
        .preview-frame {
            padding: 0.5rem !important;
            max-height: 350px !important;
        }
    }

    /* Ensure the code tabs container doesn't break layout */
    .code-tabs-container {
        min-width: 0; /* Prevents flex item from overflowing */
        overflow: hidden;
    }

    .code-tab-panel {
        min-width: 0;
        overflow: hidden;
    }

    .code-block-wrapper {
        min-width: 0;
        overflow: hidden;
    }

    /* Smooth scrolling indicator for code tabs */
    @media (max-width: 576px) {
        .code-tabs::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 30px;
            background: linear-gradient(to right, transparent, rgba(13, 13, 13, 0.9));
            pointer-events: none;
            z-index: 1;
        }
        
        .code-tabs {
            position: relative;
        }
    }
   
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="form-detail-section">
    <section style="margin-top:4.5rem">
        <div class="hero-bg">
            <div class="hero-gradient hero-gradient-1"></div>
            <div class="hero-gradient hero-gradient-2"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    HTML/CSS + Tailwind
                </div>
                
                <h1 class="hero-title">
                    <span class="highlight">Scholarship</span><br>Application Form
                </h1>
            </div>
        </div>
    </section>
    
    <div class="container">
        
        <div class="form-breadcrumb">
            <a href="<?php echo e(route('Home.library')); ?>">Library</a>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18l6-6-6-6"/>
            </svg>
            <a href="<?php echo e(route('Home.library.ApplicationForm')); ?>">Application Forms</a>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18l6-6-6-6"/>
            </svg>
            <span>Scholarship Application Form</span>
        </div>

        <div class="form-preview-code">
            
            <div class="form-preview-card">
                <div class="form-preview-header">
                    <div>
                        <h2>Scholarship Application Form</h2>
                        <p class="form-preview-subtitle">Apply for educational scholarships and financial aid opportunities.</p>
                    </div>
                </div>
                
                <div class="live-form-preview">
                    <h3 class="preview-title">Form Preview</h3>
                    <div class="preview-frame">
                        
                        <div class="scholarship-form-preview">
                            <h3>Scholarship Application Form</h3>
                            <p class="form-description">
                                Apply for educational scholarships and financial aid opportunities.
                            </p>

                            <h4>Student information</h4>

                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-input" placeholder="Enter your full name" disabled>
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" class="form-input" placeholder="MM/DD/YYYY" disabled>
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-input" placeholder="Enter your email" disabled>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="tel" class="form-input" placeholder="Enter your phone number" disabled>
                            </div>

                            <h4>Academic information</h4>

                            <div class="form-group">
                                <label>School/University</label>
                                <input type="text" class="form-input" placeholder="Name of institution" disabled>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Graduation Year</label>
                                    <input type="text" class="form-input" placeholder="YYYY" disabled>
                                </div>
                                <div class="form-group">
                                    <label>GPA</label>
                                    <input type="text" class="form-input" placeholder="0.0 - 4.0" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Major/Field of Study</label>
                                <input type="text" class="form-input" placeholder="Your major" disabled>
                            </div>

                            <h4>Scholarship details</h4>

                            <div class="form-group">
                                <label>Scholarship Name</label>
                                <input type="text" class="form-input" placeholder="Name of scholarship" disabled>
                            </div>

                            <div class="form-group">
                                <label>Amount Requested</label>
                                <input type="text" class="form-input" placeholder="$" disabled>
                            </div>

                            <div class="form-group">
                                <label>Personal Statement</label>
                                <textarea class="form-input" placeholder="Write your personal statement here..." disabled></textarea>
                            </div>

                            <button class="form-submit" disabled>Submit Scholarship Application</button>
                            
                            <div class="form-note">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="12" y1="12" x2="12" y2="16"/>
                                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                                </svg>
                                This is a preview. The actual form will be fully interactive.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="code-tabs-container">
                <div class="code-tabs-header">
                    <h3 class="code-tabs-title">Get the code</h3>
                    <p class="code-tabs-subtitle">Copy and paste this code into your website. Don't forget to replace <span class="code-highlight">your-endpoint</span> with your actual 000form endpoint URL.</p>
                </div>
                
                <div class="code-tabs">
                    <button class="code-tab active" onclick="switchTab(event, 'html-tab')">HTML</button>
                    <button class="code-tab" onclick="switchTab(event, 'css-tab')">CSS</button>
                    <button class="code-tab" onclick="switchTab(event, 'tailwind-tab')">Tailwind</button>
                </div>
                
                <div id="html-tab" class="code-tab-panel active">
                    <div class="code-block-wrapper">
                        <div class="code-block-header">
                            <div class="code-block-info">
                                <span class="code-block-language">HTML</span>
                                <span class="code-block-desc">Complete HTML form with 000form endpoint</span>
                            </div>
                            <button class="code-copy-btn" onclick="copyCode(this, 'html-code-content')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy HTML
                            </button>
                        </div>
                        <div class="code-block-content">
                            <pre id="html-code-content"><span class="hljs-tag">&lt;form</span> <span class="hljs-attr">action=</span><span class="hljs-string">"https://000form.com/f/your-endpoint"</span> <span class="hljs-attr">method=</span><span class="hljs-string">"POST"</span> <span class="hljs-attr">class=</span><span class="hljs-string">"scholarship-form"</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;h3&gt;</span>Scholarship Application Form<span class="hljs-tag">&lt;/h3&gt;</span>
  <span class="hljs-tag">&lt;p</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-description"</span><span class="hljs-tag">&gt;</span>
    Apply for educational scholarships and financial aid opportunities.
  <span class="hljs-tag">&lt;/p&gt;</span>

  <span class="hljs-tag">&lt;h4&gt;</span>Student information<span class="hljs-tag">&lt;/h4&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"full_name"</span><span class="hljs-tag">&gt;</span>Full Name<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"full_name"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"full_name"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Enter your full name"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"dob"</span><span class="hljs-tag">&gt;</span>Date of Birth<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"dob"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"dob"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"MM/DD/YYYY"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"email"</span><span class="hljs-tag">&gt;</span>Email Address<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"email"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"email"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"email"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Enter your email"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"phone"</span><span class="hljs-tag">&gt;</span>Phone Number<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"tel"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"phone"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"phone"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Enter your phone number"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;h4&gt;</span>Academic information<span class="hljs-tag">&lt;/h4&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"institution"</span><span class="hljs-tag">&gt;</span>School/University<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"institution"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"institution"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Name of institution"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-row"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"graduation_year"</span><span class="hljs-tag">&gt;</span>Graduation Year<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"graduation_year"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"graduation_year"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"YYYY"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"gpa"</span><span class="hljs-tag">&gt;</span>GPA<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"gpa"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"gpa"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"0.0 - 4.0"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"major"</span><span class="hljs-tag">&gt;</span>Major/Field of Study<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"major"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"major"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Your major"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;h4&gt;</span>Scholarship details<span class="hljs-tag">&lt;/h4&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"scholarship_name"</span><span class="hljs-tag">&gt;</span>Scholarship Name<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"scholarship_name"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"scholarship_name"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Name of scholarship"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"amount"</span><span class="hljs-tag">&gt;</span>Amount Requested<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"amount"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"amount"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"$"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"statement"</span><span class="hljs-tag">&gt;</span>Personal Statement<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;textarea</span> <span class="hljs-attr">id=</span><span class="hljs-string">"statement"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"statement"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Write your personal statement here..."</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;&lt;/textarea&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;button</span> <span class="hljs-attr">type=</span><span class="hljs-string">"submit"</span> <span class="hljs-attr">class=</span><span class="hljs-string">"submit-btn"</span><span class="hljs-tag">&gt;</span>Submit Scholarship Application<span class="hljs-tag">&lt;/button&gt;</span>
<span class="hljs-tag">&lt;/form&gt;</span></pre>
                        </div>
                    </div>
                </div>
                
                <div id="css-tab" class="code-tab-panel">
                    <div class="code-block-wrapper">
                        <div class="code-block-header">
                            <div class="code-block-info">
                                <span class="code-block-language">CSS</span>
                                <span class="code-block-desc">Styling for the scholarship application form</span>
                            </div>
                            <button class="code-copy-btn" onclick="copyCode(this, 'css-code-content')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy CSS
                            </button>
                        </div>
                        <div class="code-block-content">
                            <pre id="css-code-content"><span class="hljs-selector-class">.scholarship-form</span> {
  <span class="hljs-attribute">max-width</span>: <span class="hljs-number">600px</span>;
  <span class="hljs-attribute">margin</span>: <span class="hljs-number">0</span> auto;
  <span class="hljs-attribute">padding</span>: <span class="hljs-number">2rem</span>;
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#0d0d0d</span>;
  <span class="hljs-attribute">border</span>: <span class="hljs-number">1px</span> solid <span class="hljs-number">#1a1a1a</span>;
  <span class="hljs-attribute">border-radius</span>: <span class="hljs-number">12px</span>;
  <span class="hljs-attribute">font-family</span>: <span class="hljs-string">'Outfit'</span>, sans-serif;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">h3</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">1.5rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0.5rem</span>;
  <span class="hljs-attribute">letter-spacing</span>: -<span class="hljs-number">0.02em</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.form-description</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.9rem</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#888888</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">1.5rem</span>;
  <span class="hljs-attribute">line-height</span>: <span class="hljs-number">1.6</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">h4</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">1.1rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#00ff88</span>;
  <span class="hljs-attribute">margin</span>: <span class="hljs-number">1.5rem</span> <span class="hljs-number">0</span> <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">padding-bottom</span>: <span class="hljs-number">0.5rem</span>;
  <span class="hljs-attribute">border-bottom</span>: <span class="hljs-number">1px</span> dashed <span class="hljs-number">#2a2a2a</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.form-group</span> {
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">1.25rem</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">label</span> {
  <span class="hljs-attribute">display</span>: block;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.85rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#e6edf3</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0.5rem</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="text"]</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="email"]</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="tel"]</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">select</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">textarea</span> {
  <span class="hljs-attribute">width</span>: <span class="hljs-number">100%</span>;
  <span class="hljs-attribute">padding</span>: <span class="hljs-number">0.75rem</span> <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#111111</span>;
  <span class="hljs-attribute">border</span>: <span class="hljs-number">1px</span> solid <span class="hljs-number">#1a1a1a</span>;
  <span class="hljs-attribute">border-radius</span>: <span class="hljs-number">8px</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.95rem</span>;
  <span class="hljs-attribute">transition</span>: all <span class="hljs-number">0.2s</span> ease;
  <span class="hljs-attribute">font-family</span>: inherit;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">textarea</span> {
  <span class="hljs-attribute">min-height</span>: <span class="hljs-number">120px</span>;
  <span class="hljs-attribute">resize</span>: vertical;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-pseudo">:focus</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">select</span><span class="hljs-selector-pseudo">:focus</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">textarea</span><span class="hljs-selector-pseudo">:focus</span> {
  <span class="hljs-attribute">outline</span>: none;
  <span class="hljs-attribute">border-color</span>: <span class="hljs-number">#00ff88</span>;
  <span class="hljs-attribute">box-shadow</span>: <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">3px</span> <span class="hljs-built_in">rgba</span>(0, 255, 136, 0.15);
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-pseudo">::placeholder</span>,
<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-tag">textarea</span><span class="hljs-selector-pseudo">::placeholder</span> {
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#555555</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.form-row</span> {
  <span class="hljs-attribute">display</span>: flex;
  <span class="hljs-attribute">gap</span>: <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">margin-top</span>: <span class="hljs-number">0.5rem</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.form-row</span> <span class="hljs-selector-class">.form-group</span> {
  <span class="hljs-attribute">flex</span>: <span class="hljs-number">1</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.submit-btn</span> {
  <span class="hljs-attribute">width</span>: <span class="hljs-number">100%</span>;
  <span class="hljs-attribute">padding</span>: <span class="hljs-number">0.875rem</span> <span class="hljs-number">1.5rem</span>;
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#00ff88</span>;
  <span class="hljs-attribute">border</span>: none;
  <span class="hljs-attribute">border-radius</span>: <span class="hljs-number">8px</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#050505</span>;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">cursor</span>: pointer;
  <span class="hljs-attribute">transition</span>: all <span class="hljs-number">0.2s</span> ease;
  <span class="hljs-attribute">margin-top</span>: <span class="hljs-number">0.5rem</span>;
}

<span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.submit-btn</span><span class="hljs-selector-pseudo">:hover</span> {
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">transform</span>: <span class="hljs-built_in">translateY</span>(-<span class="hljs-number">1px</span>);
  <span class="hljs-attribute">box-shadow</span>: <span class="hljs-number">0</span> <span class="hljs-number">4px</span> <span class="hljs-number">20px</span> <span class="hljs-built_in">rgba</span>(0, 255, 136, 0.15);
}

<span class="hljs-keyword">@media</span> (<span class="hljs-attribute">max-width:</span> <span class="hljs-number">768px</span>) {
  <span class="hljs-selector-class">.scholarship-form</span> {
    <span class="hljs-attribute">padding</span>: <span class="hljs-number">1.5rem</span>;
  }
  
  <span class="hljs-selector-class">.scholarship-form</span> <span class="hljs-selector-class">.form-row</span> {
    <span class="hljs-attribute">flex-direction</span>: column;
    <span class="hljs-attribute">gap</span>: <span class="hljs-number">0.5rem</span>;
  }
}</pre>
                        </div>
                    </div>
                </div>

                <div id="tailwind-tab" class="code-tab-panel">
                    <div class="code-block-wrapper">
                        <div class="code-block-header">
                            <div class="code-block-info">
                                <span class="code-block-language">Tailwind CSS</span>
                                <span class="code-block-desc">Tailwind version with external CSS file</span>
                            </div>
                            <button class="code-copy-btn" onclick="copyCode(this, 'tailwind-code-content')">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                Copy Code
                            </button>
                        </div>
                        <div class="code-block-content">
                            <pre id="tailwind-code-content"><span class="hljs-comment">&lt;!-- Add Tailwind CSS CDN to your &lt;head&gt; --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"https://cdn.tailwindcss.com"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">form</span> <span class="hljs-attr">action</span>=<span class="hljs-string">"https://000form.com/f/your-endpoint"</span> 
      <span class="hljs-attr">method</span>=<span class="hljs-string">"POST"</span>
      <span class="hljs-attr">class</span>=<span class="hljs-string">"max-w-2xl mx-auto p-8 bg-[#0d0d0d] border border-[#1a1a1a] rounded-xl font-sans"</span>&gt;</span>
  
  <span class="hljs-tag">&lt;<span class="hljs-name">h3</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-2xl font-semibold text-[#fafafa] mb-2 tracking-tight"</span>&gt;</span>
    Scholarship Application Form
  <span class="hljs-tag">&lt;/<span class="hljs-name">h3</span>&gt;</span>
  
  <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-sm text-[#888888] mb-6 leading-relaxed"</span>&gt;</span>
    Apply for educational scholarships and financial aid opportunities.
  <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">h4</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-lg font-semibold text-[#00ff88] mb-4 pb-2 border-b border-dashed border-[#2a2a2a]"</span>&gt;</span>
    Student information
  <span class="hljs-tag">&lt;/<span class="hljs-name">h4</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Full Name<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"full_name"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Enter your full name"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Date of Birth<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"dob"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"MM/DD/YYYY"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Email Address<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"email"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"email"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Enter your email"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Phone Number<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"tel"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"phone"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Enter your phone number"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">h4</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-lg font-semibold text-[#00ff88] mt-6 mb-4 pb-2 border-b border-dashed border-[#2a2a2a]"</span>&gt;</span>
    Academic information
  <span class="hljs-tag">&lt;/<span class="hljs-name">h4</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>School/University<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"institution"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Name of institution"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col sm:flex-row gap-4 mb-5 mt-2"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Graduation Year<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"graduation_year"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"YYYY"</span>
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
             <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>GPA<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"gpa"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"0.0 - 4.0"</span>
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
             <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Major/Field of Study<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"major"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Your major"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">h4</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-lg font-semibold text-[#00ff88] mt-6 mb-4 pb-2 border-b border-dashed border-[#2a2a2a]"</span>&gt;</span>
    Scholarship details
  <span class="hljs-tag">&lt;/<span class="hljs-name">h4</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Scholarship Name<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"scholarship_name"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Name of scholarship"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-5"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Amount Requested<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"amount"</span>
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"$"</span>
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-6"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-semibold text-[#e6edf3] mb-2"</span>&gt;</span>Personal Statement<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">textarea</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"statement"</span>
              <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Write your personal statement here..."</span>
              <span class="hljs-attr">rows</span>=<span class="hljs-string">"5"</span>
              <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] transition-all resize-y"</span>
              <span class="hljs-attr">required</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">textarea</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">button</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"submit"</span>
          <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full py-3 px-6 bg-[#00ff88] text-[#050505] font-semibold rounded-lg hover:bg-white transition-all hover:-translate-y-0.5 hover:shadow-lg hover:shadow-[#00ff88]/20"</span>&gt;</span>
    Submit Scholarship Application
  <span class="hljs-tag">&lt;/<span class="hljs-name">button</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">form</span>&gt;</span></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-instructions">
            <div class="instruction-card">
                <div class="instruction-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="12" x2="12" y2="16"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
                </div>
                <div class="instruction-content">
                    <h4>How to use this form</h4>
                    <ol>
                        <li><strong>Copy the HTML code</strong> and paste it into your website where you want the form to appear.</li>
                        <li><strong>Copy the CSS code</strong> and add it to your stylesheet, or use the Tailwind version if you're using Tailwind CSS.</li>
                        <li><strong>Replace <code>your-endpoint</code></strong> in the form action with your actual 000form endpoint URL.</li>
                        <li><strong>That's it!</strong> Your form will start receiving scholarship applications directly to your inbox.</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="related-forms">
            <h3>Related Application Forms</h3>
            <div class="related-forms-grid">
                <a href="<?php echo e(route('Home.library.JobApplicationForm')); ?>" class="related-form-card">
                    <h4>Job Application Form</h4>
                    <p>Minimal job application form</p>
                    <span class="related-form-link">View form →</span>
                </a>
                <a href="<?php echo e(route('Home.library.RentalApplicationForm')); ?>" class="related-form-card">
                    <h4>Rental Application Form</h4>
                    <p>Property rental application</p>
                    <span class="related-form-link">View form →</span>
                </a>
                <a href="<?php echo e(route('Home.library.InternshipApplicationForm')); ?>" class="related-form-card">
                    <h4>Internship Application Form</h4>
                    <p>Student internship application</p>
                    <span class="related-form-link">View form →</span>
                </a>
            </div>
        </div>
        
    </div>
</section>

<script>
    function switchTab(event, tabId) {
        const tabs = document.querySelectorAll('.code-tab');
        const panels = document.querySelectorAll('.code-tab-panel');
        
        tabs.forEach(tab => tab.classList.remove('active'));
        panels.forEach(panel => panel.classList.remove('active'));
        
        event.target.classList.add('active');
        document.getElementById(tabId).classList.add('active');
    }
    
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        let textToCopy = codeElement.textContent || codeElement.innerText;
        textToCopy = textToCopy.replace(/^\s+|\s+$/g, '');
        
        navigator.clipboard.writeText(textToCopy).then(function() {
            const originalHTML = button.innerHTML;
            button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
            
            setTimeout(function() {
                button.innerHTML = originalHTML;
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
            alert('Failed to copy code. Please try again.');
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const preElements = document.querySelectorAll('.code-block-content pre');
        preElements.forEach(pre => {
            pre.classList.add('hljs');
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/Library/Scholarship-ApplicationForm.blade.php ENDPATH**/ ?>