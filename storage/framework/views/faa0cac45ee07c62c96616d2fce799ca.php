

<?php $__env->startSection('title', 'Tenant Application Form - 000form Library'); ?>

<?php $__env->startPush('styles'); ?>
<link href="<?php echo e(asset('css/library.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/category.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/tenant-form.css')); ?>" rel="stylesheet">
<style>
    /* Additional inline styles to ensure equal height */
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
    /* ============================================
      TENANT APPLICATION FORM - MOBILE RESPONSIVE
      ============================================ */

    /* Large Tablets & Small Desktops (992px and below) */
    @media (max-width: 992px) {
        .form-preview-code {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .form-preview-card {
            order: 1;
        }
        
        .code-tabs-container {
            order: 2;
        }
        
        .preview-frame {
            max-height: 500px;
        }
        
        .code-block-content {
            max-height: 400px;
            min-height: 300px;
        }
        
        /* Related Forms Grid */
        .related-forms-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }

    /* Tablets (768px and below) */
    @media (max-width: 768px) {
        .form-detail-section {
            padding: 0 1rem;
        }
        
        .form-preview-code {
            gap: 1.5rem;
        }
        
        /* Breadcrumb */
        .form-breadcrumb {
            font-size: 0.8rem;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 0.75rem 0;
        }
        
        .form-breadcrumb a {
            font-size: 0.8rem;
        }
        
        .form-breadcrumb span {
            font-size: 0.8rem;
        }
        
        /* Form Preview Card */
        .form-preview-card {
            padding: 0;
        }
        
        .form-preview-header {
            padding: 1.25rem;
        }
        
        .form-preview-header h2 {
            font-size: 1.25rem;
        }
        
        .form-preview-subtitle {
            font-size: 0.85rem;
        }
        
        /* Live Preview */
        .live-form-preview {
            padding: 0 1rem 1.5rem;
        }
        
        .preview-title {
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        
        .preview-frame {
            padding: 1rem;
            max-height: 450px;
            overflow-y: auto;
        }
        
        /* Tenant Form Preview */
        .tenant-form-preview {
            padding: 0;
        }
        
        .tenant-form-preview .form-heading {
            font-size: 0.95rem;
            margin: 1rem 0 0.75rem;
            padding-bottom: 0.375rem;
        }
        
        .tenant-form-preview .form-heading:first-of-type {
            margin-top: 0;
        }
        
        .tenant-form-preview .form-group {
            margin-bottom: 1rem;
        }
        
        .tenant-form-preview .form-label {
            font-size: 0.82rem;
            margin-bottom: 0.3rem;
        }
        
        .tenant-form-preview .form-input,
        .tenant-form-preview .form-textarea {
            padding: 0.65rem 0.875rem;
            font-size: 0.875rem;
            margin: 0.35rem 0;
            border-radius: 7px;
        }
        
        .tenant-form-preview .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .tenant-form-preview .form-row .form-input {
            margin-bottom: 0.5rem;
        }
        
        .tenant-form-preview .form-options {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .tenant-form-preview .option-label {
            font-size: 0.82rem;
        }
        
        .tenant-form-preview .form-submit {
            font-size: 0.9rem;
            padding: 0.7rem 1.25rem;
        }
        
        .tenant-form-preview .form-note {
            font-size: 0.75rem;
            padding: 0.75rem;
        }
        
        /* Code Tabs Container */
        .code-tabs-header {
            padding: 1.25rem;
        }
        
        .code-tabs-title {
            font-size: 1.1rem;
        }
        
        .code-tabs-subtitle {
            font-size: 0.8rem;
            line-height: 1.5;
        }
        
        .code-tabs {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            flex-wrap: nowrap;
            flex-direction: row !important;
            display: flex !important;
            gap: 0;
            border-bottom: 1px solid #2a2a2a;
        }
        
        .code-tabs::-webkit-scrollbar {
            display: none;
        }
        
        .code-tabs {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        .code-tab {
            padding: 0.625rem 0.875rem;
            font-size: 0.8rem;
            white-space: nowrap;
            flex-shrink: 0;
            width: auto !important;
            min-width: fit-content !important;
            border-bottom: 2px solid transparent;
        }
        
        .code-tab.active {
            border-bottom-color: #00ff88;
        }
        
        .code-block-header {
            padding: 0.75rem 1rem;
            flex-wrap: nowrap !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 0.75rem !important;
        }
        
        .code-block-info {
            flex-direction: row !important;
            align-items: center !important;
            gap: 0.5rem !important;
            flex-shrink: 1;
            min-width: 0;
        }
        
        .code-block-language {
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
            flex-shrink: 0;
        }
        
        .code-block-desc {
            font-size: 0.75rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .code-copy-btn {
            font-size: 0.75rem;
            padding: 0.4rem 0.75rem;
            width: auto !important;
            flex-shrink: 0;
            white-space: nowrap;
            min-width: fit-content !important;
        }
        
        .code-block-content {
            max-height: 350px;
            min-height: 250px;
            padding: 1rem;
            overflow: auto !important;
            -webkit-overflow-scrolling: touch;
        }
        
        .code-block-content pre {
            font-size: 0.72rem;
            line-height: 1.5;
            white-space: pre !important;
            word-wrap: normal !important;
            overflow-x: auto !important;
        }
        
        /* Instructions Card */
        .form-instructions {
            margin-top: 2rem;
        }
        
        .instruction-card {
            padding: 1.25rem;
            gap: 1rem;
        }
        
        .instruction-icon {
            width: 2.5rem;
            height: 2.5rem;
            min-width: 2.5rem;
            flex-shrink: 0;
        }
        
        .instruction-content h4 {
            font-size: 1rem;
        }
        
        .instruction-content ol {
            padding-left: 1.25rem;
        }
        
        .instruction-content li {
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }
        
        .instruction-content code {
            font-size: 0.78rem;
            padding: 0.15rem 0.4rem;
        }
        
        /* Related Forms */
        .related-forms {
            margin-top: 2.5rem;
            padding: 1.5rem 0;
        }
        
        .related-forms h3 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        
        .related-forms-grid {
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        
        .related-form-card {
            padding: 1.25rem;
        }
        
        .related-form-card h4 {
            font-size: 1rem;
        }
        
        .related-form-card p {
            font-size: 0.8rem;
        }
        
        .related-form-link {
            font-size: 0.8rem;
        }
    }

    /* Mobile Phones (576px and below) */
    @media (max-width: 576px) {
        .form-detail-section {
            padding: 0 0.75rem;
        }
        
        /* Hero Content */
        .hero-content {
            padding: 2rem 1rem;
        }
        
        .hero-badge {
            font-size: 0.7rem;
            padding: 0.3rem 0.75rem;
        }
        
        .hero-title {
            font-size: 1.75rem;
        }
        
        /* Breadcrumb */
        .form-breadcrumb {
            font-size: 0.75rem;
            padding: 0.5rem 0;
        }
        
        .form-breadcrumb a,
        .form-breadcrumb span {
            font-size: 0.75rem;
        }
        
        .form-breadcrumb svg {
            width: 14px;
            height: 14px;
        }
        
        /* Form Preview Card */
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
        
        /* Live Preview */
        .live-form-preview {
            padding: 0 0.5rem 1rem !important;
        }
        
        .preview-title {
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }
        
        .preview-frame {
            padding: 0.5rem !important;
            max-height: 350px !important;
        }
        
        /* Tenant Form Preview */
        .tenant-form-preview .form-heading {
            font-size: 0.9rem;
            margin: 1rem 0 0.75rem;
            padding-bottom: 0.35rem;
        }
        
        .tenant-form-preview .form-group {
            margin-bottom: 0.875rem;
        }
        
        .tenant-form-preview .form-label {
            font-size: 0.78rem;
            margin-bottom: 0.25rem;
        }
        
        .tenant-form-preview .form-input,
        .tenant-form-preview .form-textarea {
            padding: 0.6rem 0.75rem;
            font-size: 0.85rem;
            margin: 0.25rem 0;
            border-radius: 6px;
        }
        
        .tenant-form-preview .form-textarea {
            min-height: 60px;
        }
        
        .tenant-form-preview .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .tenant-form-preview .form-row .form-input {
            margin-bottom: 0.375rem;
        }
        
        .tenant-form-preview .form-options {
            flex-direction: column;
            gap: 0.4rem;
            margin-top: 0.25rem;
        }
        
        .tenant-form-preview .option-label {
            font-size: 0.82rem;
            gap: 0.35rem;
        }
        
        .tenant-form-preview .form-submit {
            font-size: 0.85rem;
            padding: 0.65rem 1rem;
            border-radius: 6px;
        }
        
        .tenant-form-preview .form-note {
            font-size: 0.7rem;
            padding: 0.625rem;
            gap: 0.5rem;
        }
        
        .tenant-form-preview .form-note svg {
            width: 12px;
            height: 12px;
            min-width: 12px;
        }
        
        /* Code Tabs */
        .code-tabs-header {
            padding: 1rem;
        }
        
        .code-tabs-title {
            font-size: 1rem;
        }
        
        .code-tabs-subtitle {
            font-size: 0.75rem;
        }
        
        .code-tabs {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            display: flex !important;
            gap: 0;
        }
        
        .code-tab {
            padding: 0.5rem 0.75rem;
            font-size: 0.78rem;
            white-space: nowrap;
            flex-shrink: 0;
            width: auto !important;
            min-width: fit-content !important;
            text-align: center !important;
        }
        
        .code-block-header {
            padding: 0.625rem 0.875rem;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 0.5rem !important;
        }
        
        .code-block-info {
            flex-direction: row !important;
            align-items: center !important;
            gap: 0.35rem !important;
        }
        
        .code-block-language {
            font-size: 0.65rem !important;
            padding: 0.15rem 0.4rem !important;
        }
        
        .code-block-desc {
            font-size: 0.7rem !important;
        }
        
        .code-copy-btn {
            width: auto !important;
            flex-shrink: 0;
            white-space: nowrap;
            font-size: 0.7rem !important;
            padding: 0.4rem 0.75rem !important;
            min-width: fit-content !important;
        }
        
        .code-block-content {
            max-height: 300px;
            min-height: 200px;
            padding: 0.75rem;
        }
        
        .code-block-content pre {
            font-size: 0.68rem !important;
            line-height: 1.4;
        }
        
        /* Instructions */
        .form-instructions {
            margin-top: 1.5rem;
        }
        
        .instruction-card {
            padding: 1rem;
            flex-direction: column !important;
            gap: 0.75rem;
            align-items: flex-start !important;
        }
        
        .instruction-icon {
            width: 2.25rem;
            height: 2.25rem;
            min-width: 2.25rem;
        }
        
        .instruction-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .instruction-content h4 {
            font-size: 0.95rem;
        }
        
        .instruction-content ol {
            padding-left: 1.1rem;
        }
        
        .instruction-content li {
            font-size: 0.8rem;
            margin-bottom: 0.625rem;
        }
        
        .instruction-content code {
            font-size: 0.72rem;
            padding: 0.12rem 0.35rem;
        }
        
        /* Related Forms */
        .related-forms {
            margin-top: 2rem;
            padding: 1.25rem 0;
        }
        
        .related-forms h3 {
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }
        
        .related-forms-grid {
            grid-template-columns: 1fr !important;
            gap: 0.625rem;
        }
        
        .related-form-card {
            padding: 1rem;
        }
        
        .related-form-card h4 {
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }
        
        .related-form-card p {
            font-size: 0.78rem;
            margin-bottom: 0.5rem;
        }
        
        .related-form-link {
            font-size: 0.78rem;
        }
    }

    /* Very Small Mobile Phones (380px and below) */
    @media (max-width: 380px) {
        .form-detail-section {
            padding: 0 0.5rem;
        }
        
        .hero-title {
            font-size: 1.5rem;
        }
        
        .hero-badge {
            font-size: 0.65rem;
            padding: 0.25rem 0.625rem;
        }
        
        .form-breadcrumb {
            font-size: 0.7rem;
        }
        
        .form-breadcrumb a,
        .form-breadcrumb span {
            font-size: 0.7rem;
        }
        
        .form-breadcrumb svg {
            width: 12px;
            height: 12px;
        }
        
        .form-preview-header {
            padding: 0.875rem;
        }
        
        .form-preview-header h2 {
            font-size: 1.05rem;
        }
        
        .form-preview-subtitle {
            font-size: 0.75rem;
        }
        
        .preview-frame {
            padding: 0.625rem;
        }
        
        /* Tenant Form Preview */
        .tenant-form-preview .form-heading {
            font-size: 0.85rem;
            margin: 0.875rem 0 0.625rem;
        }
        
        .tenant-form-preview .form-label {
            font-size: 0.75rem;
        }
        
        .tenant-form-preview .form-input,
        .tenant-form-preview .form-textarea {
            padding: 0.55rem 0.625rem;
            font-size: 0.8rem;
            margin: 0.2rem 0;
        }
        
        .tenant-form-preview .option-label {
            font-size: 0.78rem;
        }
        
        .tenant-form-preview .form-submit {
            font-size: 0.8rem;
            padding: 0.6rem 0.875rem;
        }
        
        .tenant-form-preview .form-note {
            font-size: 0.68rem;
        }
        
        /* Code Tabs */
        .code-tab {
            padding: 0.45rem 0.625rem;
            font-size: 0.72rem;
        }
        
        .code-block-header {
            padding: 0.5rem 0.75rem;
        }
        
        .code-block-content {
            padding: 0.625rem;
        }
        
        .code-block-content pre {
            font-size: 0.62rem !important;
        }
        
        /* Related Forms */
        .related-form-card {
            padding: 0.875rem;
        }
        
        .related-form-card h4 {
            font-size: 0.9rem;
        }
        
        .related-form-card p {
            font-size: 0.75rem;
        }
        
        .related-form-link {
            font-size: 0.75rem;
        }
    }

    /* Landscape Mode Fix for Mobile */
    @media (max-width: 768px) and (orientation: landscape) {
        .preview-frame {
            max-height: 300px;
        }
        
        .code-block-content {
            max-height: 200px;
            min-height: 150px;
        }
    }

    /* Ensure smooth touch scrolling for code blocks and preview frames */
    .preview-frame,
    .code-block-content {
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
    }

    /* Ensure proper text sizing on iOS to prevent zoom on focus */
    @supports (-webkit-touch-callout: none) {
        .tenant-form-preview .form-input,
        .tenant-form-preview .form-textarea {
            font-size: 16px;
        }
        
        @media (max-width: 576px) {
            .tenant-form-preview .form-input,
            .tenant-form-preview .form-textarea {
                font-size: 15px;
            }
        }
    }

    /* Fix for long placeholder text overflow */
    .tenant-form-preview .form-input::placeholder,
    .tenant-form-preview .form-textarea::placeholder {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .tenant-form-preview .form-textarea::placeholder {
        white-space: normal;
    }

    /* Improve touch targets on mobile */
    @media (max-width: 768px) {
        .form-breadcrumb a {
            padding: 0.25rem 0;
        }
        
        .code-tab {
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .code-copy-btn {
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .related-form-card {
            min-height: 4rem;
        }
    }

    /* Code tabs container overflow fix */
    .code-tabs-container {
        min-width: 0;
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

    /* Grade scroll indicator for code tabs on mobile */
    @media (max-width: 576px) {
        .code-tabs {
            position: relative;
        }
        
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
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- Form Preview & Code Section -->
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
                      <span class="highlight">Tenant</span><br>  Application Form
                    </h1>
                </div>
            </div>
        </section>
    <div class="container">
        
        <!-- Breadcrumb -->
        <div class="form-breadcrumb">
            <a href="<?php echo e(route('Home.library')); ?>">Library</a>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18l6-6-6-6"/>
            </svg>
            <a href="<?php echo e(route('Home.library.ApplicationForm')); ?>">Application Forms</a>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18l6-6-6-6"/>
            </svg>
            <span>Tenant Application Form</span>
        </div>

        <div class="form-preview-code">
            
            <!-- Left Column: Form Preview Card -->
            <div class="form-preview-card">
                <div class="form-preview-header">
                    <div>
                        <h2>Tenant Application Form</h2>
                        <p class="form-preview-subtitle">Thank you for taking an interest in renting one of our properties. Please fill in this form with the needed information.</p>
                    </div>
                </div>
                
                <!-- Live Form Preview -->
                <div class="live-form-preview">
                    <h3 class="preview-title">Form Preview</h3>
                    <div class="preview-frame">
                        
                        <!-- Tenant Application Form Preview -->
                        <div class="tenant-form-preview">
                            <h4 class="form-heading">Tenancy details</h4>
                            
                            <div class="form-group">
                                <label class="form-label">Property address</label>
                                <input type="text" class="form-input" placeholder="Street Address" disabled>
                                <input type="text" class="form-input" placeholder="Street Address Line 2" disabled>
                                
                                <div class="form-row">
                                    <input type="text" class="form-input" placeholder="City" disabled>
                                    <input type="text" class="form-input" placeholder="Region" disabled>
                                </div>
                                
                                <div class="form-row">
                                    <input type="text" class="form-input" placeholder="Postal / Zip Code" disabled>
                                    <input type="text" class="form-input" placeholder="Country" value="USA" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Commencement of tenancy</label>
                                <input type="text" class="form-input" placeholder="MM/DD/YYYY" disabled>
                            </div>
                            
                            <h4 class="form-heading">Applicant details</h4>
                            
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Full Name" disabled>
                                <input type="email" class="form-input" placeholder="Email Address" disabled>
                                <input type="tel" class="form-input" placeholder="Phone Number" disabled>
                                <input type="text" class="form-input" placeholder="Current Address" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Employment Status</label>
                                <div class="form-options">
                                    <label class="option-label">
                                        <input type="radio" name="employment" disabled> Employed
                                    </label>
                                    <label class="option-label">
                                        <input type="radio" name="employment" disabled> Self-employed
                                    </label>
                                    <label class="option-label">
                                        <input type="radio" name="employment" disabled> Unemployed
                                    </label>
                                    <label class="option-label">
                                        <input type="radio" name="employment" disabled> Retired
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Current Employer</label>
                                <input type="text" class="form-input" placeholder="Employer name (optional)" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Monthly Income</label>
                                <input type="text" class="form-input" placeholder="$" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Pets</label>
                                <div class="form-options">
                                    <label class="option-label">
                                        <input type="radio" name="pets" disabled> Yes
                                    </label>
                                    <label class="option-label">
                                        <input type="radio" name="pets" disabled> No
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Additional notes</label>
                                <textarea class="form-textarea" placeholder="Any additional information..." rows="1" disabled></textarea>
                            </div>
                            
                            <button class="form-submit" disabled>Submit Application</button>
                            
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
            
            <!-- Right Column: Code Tabs Container -->
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
                
                <!-- HTML Code Tab -->
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
                            <pre id="html-code-content"><span class="hljs-tag">&lt;form</span> <span class="hljs-attr">action=</span><span class="hljs-string">"https://000form.com/f/your-endpoint"</span> <span class="hljs-attr">method=</span><span class="hljs-string">"POST"</span> <span class="hljs-attr">class=</span><span class="hljs-string">"tenant-form"</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;h3&gt;</span>Tenant Application Form<span class="hljs-tag">&lt;/h3&gt;</span>
  <span class="hljs-tag">&lt;p</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-description"</span><span class="hljs-tag">&gt;</span>
    Thank you for taking an interest in renting one of our properties. 
    Please fill in this form with the needed information.
  <span class="hljs-tag">&lt;/p&gt;</span>

  <span class="hljs-tag">&lt;h4&gt;</span>Tenancy details<span class="hljs-tag">&lt;/h4&gt;</span>
  
  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"property_address"</span><span class="hljs-tag">&gt;</span>Property address<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"property_address"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"property_address"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Street Address"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"property_address2"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"property_address2"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Street Address Line 2"</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-row"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"city"</span><span class="hljs-tag">&gt;</span>City<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"city"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"city"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"City"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"region"</span><span class="hljs-tag">&gt;</span>Region<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"region"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"region"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Region"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-row"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"postal_code"</span><span class="hljs-tag">&gt;</span>Postal / Zip Code<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"postal_code"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"postal_code"</span> 
             <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Postal / Zip Code"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"country"</span><span class="hljs-tag">&gt;</span>Country<span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"country"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"country"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"USA"</span> 
             <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Country"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"commencement_date"</span><span class="hljs-tag">&gt;</span>Commencement of tenancy<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"commencement_date"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"commencement_date"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"MM/DD/YYYY"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;h4&gt;</span>Applicant details<span class="hljs-tag">&lt;/h4&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"full_name"</span><span class="hljs-tag">&gt;</span>Full Name<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"full_name"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"full_name"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Full Name"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"email"</span><span class="hljs-tag">&gt;</span>Email Address<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"email"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"email"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"email"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Email Address"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"phone"</span><span class="hljs-tag">&gt;</span>Phone Number<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"tel"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"phone"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"phone"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Phone Number"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"current_address"</span><span class="hljs-tag">&gt;</span>Current Address<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"current_address"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"current_address"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Current Address"</span> <span class="hljs-attr">required</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label&gt;</span>Employment Status<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-options"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"employed"</span><span class="hljs-tag">&gt;</span> Employed
      <span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"self-employed"</span><span class="hljs-tag">&gt;</span> Self-employed
      <span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"unemployed"</span><span class="hljs-tag">&gt;</span> Unemployed
      <span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"retired"</span><span class="hljs-tag">&gt;</span> Retired
      <span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"employer"</span><span class="hljs-tag">&gt;</span>Current Employer<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"employer"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"employer"</span> 
           <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Employer name (optional)"</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"income"</span><span class="hljs-tag">&gt;</span>Monthly Income<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"text"</span> <span class="hljs-attr">id=</span><span class="hljs-string">"income"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"income"</span> <span class="hljs-attr">placeholder=</span><span class="hljs-string">"$"</span><span class="hljs-tag">&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label&gt;</span>Pets<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-options"</span><span class="hljs-tag">&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"pets"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"yes"</span><span class="hljs-tag">&gt;</span> Yes
      <span class="hljs-tag">&lt;/label&gt;</span>
      <span class="hljs-tag">&lt;label&gt;</span>
        <span class="hljs-tag">&lt;input</span> <span class="hljs-attr">type=</span><span class="hljs-string">"radio"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"pets"</span> <span class="hljs-attr">value=</span><span class="hljs-string">"no"</span> <span class="hljs-attr">checked</span><span class="hljs-tag">&gt;</span> No
      <span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;/div&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;div</span> <span class="hljs-attr">class=</span><span class="hljs-string">"form-group"</span><span class="hljs-tag">&gt;</span>
    <span class="hljs-tag">&lt;label</span> <span class="hljs-attr">for=</span><span class="hljs-string">"notes"</span><span class="hljs-tag">&gt;</span>Additional notes<span class="hljs-tag">&lt;/label&gt;</span>
    <span class="hljs-tag">&lt;textarea</span> <span class="hljs-attr">id=</span><span class="hljs-string">"notes"</span> <span class="hljs-attr">name=</span><span class="hljs-string">"notes"</span> <span class="hljs-attr">rows=</span><span class="hljs-string">"3"</span> 
              <span class="hljs-attr">placeholder=</span><span class="hljs-string">"Any additional information..."</span><span class="hljs-tag">&gt;&lt;/textarea&gt;</span>
  <span class="hljs-tag">&lt;/div&gt;</span>

  <span class="hljs-tag">&lt;button</span> <span class="hljs-attr">type=</span><span class="hljs-string">"submit"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"submit-btn"</span><span class="hljs-tag">&gt;</span>
    Submit Application
  <span class="hljs-tag">&lt;/button&gt;</span>
<span class="hljs-tag">&lt;/form&gt;</span></pre>
                        </div>
                    </div>
                </div>
                
                <!-- CSS Code Tab -->
                <div id="css-tab" class="code-tab-panel">
                    <div class="code-block-wrapper">
                        <div class="code-block-header">
                            <div class="code-block-info">
                                <span class="code-block-language">CSS</span>
                                <span class="code-block-desc">Styling for the tenant application form</span>
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
                            <pre id="css-code-content"><span class="hljs-selector-class">.tenant-form</span> {
  <span class="hljs-attribute">max-width</span>: <span class="hljs-number">600px</span>;
  <span class="hljs-attribute">margin</span>: <span class="hljs-number">0</span> auto;
  <span class="hljs-attribute">padding</span>: <span class="hljs-number">2rem</span>;
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#0d0d0d</span>;
  <span class="hljs-attribute">border</span>: <span class="hljs-number">1px</span> solid <span class="hljs-number">#1a1a1a</span>;
  <span class="hljs-attribute">border-radius</span>: <span class="hljs-number">12px</span>;
  <span class="hljs-attribute">font-family</span>: <span class="hljs-string">'Outfit'</span>, sans-serif;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">h3</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">1.5rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0.5rem</span>;
  <span class="hljs-attribute">letter-spacing</span>: -<span class="hljs-number">0.02em</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-description</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.9rem</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#888888</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">1.5rem</span>;
  <span class="hljs-attribute">line-height</span>: <span class="hljs-number">1.6</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">h4</span> {
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">1.1rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">600</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#00ff88</span>;
  <span class="hljs-attribute">margin</span>: <span class="hljs-number">1.5rem</span> <span class="hljs-number">0</span> <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">padding-bottom</span>: <span class="hljs-number">0.5rem</span>;
  <span class="hljs-attribute">border-bottom</span>: <span class="hljs-number">1px</span> dashed <span class="hljs-number">#2a2a2a</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">h4</span><span class="hljs-selector-pseudo">:first-of-type</span> {
  <span class="hljs-attribute">margin-top</span>: <span class="hljs-number">0</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-group</span> {
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">1.25rem</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">label</span> {
  <span class="hljs-attribute">display</span>: block;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.85rem</span>;
  <span class="hljs-attribute">font-weight</span>: <span class="hljs-number">500</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#e6edf3</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0.35rem</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="text"]</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="email"]</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="tel"]</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">select</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">textarea</span> {
  <span class="hljs-attribute">width</span>: <span class="hljs-number">100%</span>;
  <span class="hljs-attribute">padding</span>: <span class="hljs-number">0.75rem</span> <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">margin</span>: <span class="hljs-number">0.5rem</span> <span class="hljs-number">0rem</span>;
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#111111</span>;
  <span class="hljs-attribute">border</span>: <span class="hljs-number">1px</span> solid <span class="hljs-number">#1a1a1a</span>;
  <span class="hljs-attribute">border-radius</span>: <span class="hljs-number">8px</span>;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.95rem</span>;
  <span class="hljs-attribute">transition</span>: all <span class="hljs-number">0.2s</span> ease;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-pseudo">:focus</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">select</span><span class="hljs-selector-pseudo">:focus</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">textarea</span><span class="hljs-selector-pseudo">:focus</span> {
  <span class="hljs-attribute">outline</span>: none;
  <span class="hljs-attribute">border-color</span>: <span class="hljs-number">#00ff88</span>;
  <span class="hljs-attribute">box-shadow</span>: <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">3px</span> <span class="hljs-built_in">rgba</span>(0, 255, 136, 0.15);
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-pseudo">::placeholder</span>,
<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">textarea</span><span class="hljs-selector-pseudo">::placeholder</span> {
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#555555</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-row</span> {
  <span class="hljs-attribute">display</span>: flex;
  <span class="hljs-attribute">gap</span>: <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">margin-top</span>: <span class="hljs-number">0.5rem</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-row</span> <span class="hljs-selector-class">.form-group</span> {
  <span class="hljs-attribute">flex</span>: <span class="hljs-number">1</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-options</span> {
  <span class="hljs-attribute">display</span>: flex;
  <span class="hljs-attribute">flex-wrap</span>: wrap;
  <span class="hljs-attribute">gap</span>: <span class="hljs-number">1rem</span>;
  <span class="hljs-attribute">margin-top</span>: <span class="hljs-number">0.25rem</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-options</span> <span class="hljs-selector-tag">label</span> {
  <span class="hljs-attribute">display</span>: inline-flex;
  <span class="hljs-attribute">align-items</span>: center;
  <span class="hljs-attribute">gap</span>: <span class="hljs-number">0.35rem</span>;
  <span class="hljs-attribute">font-size</span>: <span class="hljs-number">0.85rem</span>;
  <span class="hljs-attribute">font-weight</span>: normal;
  <span class="hljs-attribute">color</span>: <span class="hljs-number">#888888</span>;
  <span class="hljs-attribute">margin-bottom</span>: <span class="hljs-number">0</span>;
  <span class="hljs-attribute">cursor</span>: pointer;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-options</span> <span class="hljs-selector-tag">input</span><span class="hljs-selector-attr">[type="radio"]</span> {
  <span class="hljs-attribute">width</span>: auto;
  <span class="hljs-attribute">margin-right</span>: <span class="hljs-number">0.25rem</span>;
  <span class="hljs-attribute">accent-color</span>: <span class="hljs-number">#00ff88</span>;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-tag">textarea</span> {
  <span class="hljs-attribute">resize</span>: vertical;
  <span class="hljs-attribute">min-height</span>: <span class="hljs-number">80px</span>;
  <span class="hljs-attribute">font-family</span>: inherit;
}

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.submit-btn</span> {
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

<span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.submit-btn</span><span class="hljs-selector-pseudo">:hover</span> {
  <span class="hljs-attribute">background</span>: <span class="hljs-number">#fafafa</span>;
  <span class="hljs-attribute">transform</span>: <span class="hljs-built_in">translateY</span>(-<span class="hljs-number">1px</span>);
  <span class="hljs-attribute">box-shadow</span>: <span class="hljs-number">0</span> <span class="hljs-number">4px</span> <span class="hljs-number">20px</span> <span class="hljs-built_in">rgba</span>(0, 255, 136, 0.15);
}

<span class="hljs-keyword">@media</span> (<span class="hljs-attribute">max-width:</span> <span class="hljs-number">768px</span>) {
  <span class="hljs-selector-class">.tenant-form</span> {
    <span class="hljs-attribute">padding</span>: <span class="hljs-number">1.5rem</span>;
  }
  
  <span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-row</span> {
    <span class="hljs-attribute">flex-direction</span>: column;
    <span class="hljs-attribute">gap</span>: <span class="hljs-number">0.5rem</span>;
  }
  
  <span class="hljs-selector-class">.tenant-form</span> <span class="hljs-selector-class">.form-options</span> {
    <span class="hljs-attribute">flex-direction</span>: column;
    <span class="hljs-attribute">gap</span>: <span class="hljs-number">0.5rem</span>;
  }
}</pre>
                        </div>
                    </div>
                </div>
                
                <!-- Tailwind Code Tab -->
                <!-- Tailwind Code Tab -->
<div id="tailwind-tab" class="code-tab-panel">
    <div class="code-block-wrapper">
        <div class="code-block-header">
            <div class="code-block-info">
                <span class="code-block-language">Tailwind CSS</span>
                <span class="code-block-desc">Complete Tailwind version with CDN</span>
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
            <pre id="tailwind-code-content"><span class="hljs-comment">&lt;!-- Add this to your &lt;head&gt; section --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"https://cdn.tailwindcss.com"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span>

<span class="hljs-comment">&lt;!-- Add this CSS for custom radio button color and form enhancements --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">style</span>&gt;</span><span class="css">
    <span class="hljs-selectattr">[type="radio"]</span> {
        <span class="hljs-attribute">accent-color</span>: <span class="hljs-number">#00ff88</span>;
    }
    <span class="hljs-comment">/* Optional: Smooth focus ring */</span>
    <span class="hljs-selector-tag">input</span><span class="hljs-selector-pseudo">:focus</span>, <span class="hljs-selector-tag">textarea</span><span class="hljs-selector-pseudo">:focus</span> {
        <span class="hljs-attribute">outline</span>: none;
        <span class="hljs-attribute">box-shadow</span>: <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">0</span> <span class="hljs-number">3px</span> <span class="hljs-built_in">rgba</span>(0, 255, 136, 0.15);
    }
</span><span class="hljs-tag">&lt;/<span class="hljs-name">style</span>&gt;</span>

<span class="hljs-comment">&lt;!-- Tenant Application Form with Tailwind Classes --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">form</span> <span class="hljs-attr">action</span>=<span class="hljs-string">"https://000form.com/f/your-endpoint"</span> 
      <span class="hljs-attr">method</span>=<span class="hljs-string">"POST"</span> 
      <span class="hljs-attr">class</span>=<span class="hljs-string">"max-w-2xl mx-auto p-8 bg-[#0d0d0d] border border-[#1a1a1a] rounded-xl font-['Outfit',sans-serif]"</span>&gt;</span>
  
  <span class="hljs-tag">&lt;<span class="hljs-name">h3</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-2xl font-semibold text-[#fafafa] mb-2 tracking-tight"</span>&gt;</span>
    Tenant Application Form
  <span class="hljs-tag">&lt;/<span class="hljs-name">h3</span>&gt;</span>
  
  <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-sm text-[#888888] mb-6 leading-relaxed"</span>&gt;</span>
    Thank you for taking an interest in renting one of our properties. 
    Please fill in this form with the needed information.
  <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">h4</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-lg font-semibold text-[#00ff88] mt-6 mb-4 pb-2 border-b border-dashed border-[#2a2a2a]"</span>&gt;</span>
    Tenancy details
  <span class="hljs-tag">&lt;/<span class="hljs-name">h4</span>&gt;</span>
  
  <span class="hljs-comment">&lt;!-- Property address --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>
      Property address
    <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"property_address"</span> 
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Street Address"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200 mb-2"</span>
           <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"property_address2"</span> 
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Street Address Line 2"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- City and Region --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col sm:flex-row gap-4 mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>City<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"city"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"City"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
             <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>Region<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"region"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Region"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
             <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Postal Code and Country --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col sm:flex-row gap-4 mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>Postal / Zip Code<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"postal_code"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Postal / Zip Code"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
             <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>Country<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"country"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"USA"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Commencement Date --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>
      Commencement of tenancy
    <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"commencement_date"</span> 
           <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"MM/DD/YYYY"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">h4</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-lg font-semibold text-[#00ff88] mt-6 mb-4 pb-2 border-b border-dashed border-[#2a2a2a]"</span>&gt;</span>
    Applicant details
  <span class="hljs-tag">&lt;/<span class="hljs-name">h4</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Applicant fields --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"space-y-3 mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"full_name"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Full Name"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
           <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"email"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"email"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Email Address"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
           <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"tel"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"phone"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Phone Number"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
           <span class="hljs-attr">required</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"current_address"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Current Address"</span> 
           <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>
           <span class="hljs-attr">required</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Employment Status --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-2"</span>&gt;</span>
      Employment Status
    <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-wrap gap-4"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"employed"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> Employed
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"self-employed"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> Self-employed
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"unemployed"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> Unemployed
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"employment_status"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"retired"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> Retired
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Employer and Income --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col sm:flex-row gap-4 mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>Current Employer<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"employer"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Employer name (optional)"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex-1"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>Monthly Income<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"income"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"$"</span> 
             <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200"</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Pets --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-4"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-2"</span>&gt;</span>Pets<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex gap-4"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"pets"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"yes"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> Yes
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex items-center gap-2 text-sm text-[#888888] hover:text-[#fafafa] transition-colors cursor-pointer"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"radio"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"pets"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"no"</span> <span class="hljs-attr">checked</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"w-4 h-4"</span>&gt;</span> No
      <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-comment">&lt;!-- Additional Notes --&gt;</span>
  <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-6"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"block text-sm font-medium text-[#e6edf3] mb-1"</span>&gt;</span>
      Additional notes
    <span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">textarea</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"notes"</span> <span class="hljs-attr">rows</span>=<span class="hljs-string">"3"</span> 
              <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full px-4 py-3 bg-[#111111] border border-[#1a1a1a] rounded-lg text-[#fafafa] placeholder-[#555555] focus:border-[#00ff88] focus:ring-0 transition-all duration-200 resize-y"</span>
              <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Any additional information..."</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">textarea</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

  <span class="hljs-tag">&lt;<span class="hljs-name">button</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"submit"</span> 
          <span class="hljs-attr">class</span>=<span class="hljs-string">"w-full py-3 px-6 bg-[#00ff88] text-[#050505] font-semibold rounded-lg hover:bg-white transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-[#00ff88]/20"</span>&gt;</span>
    Submit Application
  <span class="hljs-tag">&lt;/<span class="hljs-name">button</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">form</span>&gt;</span></pre>
                        </div>
                    </div>
                </div>
                
                    </div>
                </div>
        
        <!-- Instructions -->
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
                        <li><strong>That's it!</strong> Your form will start receiving submissions directly to your inbox.</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- Related Forms -->
        <div class="related-forms">
            <h3>Related Application Forms</h3>
            <div class="related-forms-grid">
                <a href="#" class="related-form-card">
                    <h4>Job Application Form</h4>
                    <p>Minimal job application form</p>
                    <span class="related-form-link">View form →</span>
                </a>
                <a href="#" class="related-form-card">
                    <h4>Rental Application Form</h4>
                    <p>Property rental application</p>
                    <span class="related-form-link">View form →</span>
                </a>
                <a href="#" class="related-form-card">
                    <h4>Vendor Application Form</h4>
                    <p>Supplier registration form</p>
                    <span class="related-form-link">View form →</span>
                </a>
            </div>
        </div>
        
    </div>
</section>

<!-- JavaScript for Copy Functionality -->
<script>
    function switchTab(event, tabId) {
        // Remove active class from all tabs and panels
        const tabs = document.querySelectorAll('.code-tab');
        const panels = document.querySelectorAll('.code-tab-panel');
        
        tabs.forEach(tab => tab.classList.remove('active'));
        panels.forEach(panel => panel.classList.remove('active'));
        
        // Add active class to clicked tab
        event.target.classList.add('active');
        
        // Show corresponding panel
        document.getElementById(tabId).classList.add('active');
    }
    
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        let textToCopy = codeElement.textContent || codeElement.innerText;
        
        // Clean up the text for copying
        textToCopy = textToCopy.replace(/^\s+|\s+$/g, '');
        
        navigator.clipboard.writeText(textToCopy).then(function() {
            // Store original button content
            const originalHTML = button.innerHTML;
            
            // Change button text to "Copied!"
            button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
            
            // Reset button text after 2 seconds
            setTimeout(function() {
                button.innerHTML = originalHTML;
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
            alert('Failed to copy code. Please try again.');
        });
    }

    // Add syntax highlighting class to pre elements if needed
    document.addEventListener('DOMContentLoaded', function() {
        const preElements = document.querySelectorAll('.code-block-content pre');
        preElements.forEach(pre => {
            pre.classList.add('hljs');
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Git-folders\000form.com\resources\views/Library/Tenant-ApplicationForm.blade.php ENDPATH**/ ?>