<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\FormEndpointController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\FormButtonController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\FormValidationController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserEmailController;
use App\Http\Controllers\ExpressController;

/*
|--------------------------------------------------------------------------
| Pop-up Form Routes
|--------------------------------------------------------------------------
*/
Route::get('/forms/{id}/embed', [FormButtonController::class, 'embed'])
    ->name('forms.embed')
    ->middleware('auth');

Route::post('/forms/{id}/popup-config', [FormButtonController::class, 'saveConfig'])
    ->name('forms.popup.save')
    ->middleware('auth');

Route::get('/formbutton/{slug}/widget.js', [FormButtonController::class, 'widget'])
    ->name('formbutton.widget');

/*
|--------------------------------------------------------------------------
| Google Captcha Routes
|--------------------------------------------------------------------------
*/
Route::get('/recaptcha-config', function () {
    return response()->json([
        'sitekey' => config('services.recaptcha.site_key'),
    ]);
})->name('recaptcha.config');
Route::get('/captcha/{formId}', [FormSubmissionController::class, 'showCaptcha'])->name('captcha.show');
Route::post('/captcha/{formId}/verify', [FormSubmissionController::class, 'verifyCaptcha'])->name('captcha.verify');

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/docs', [PageController::class, 'docs'])->name('docs');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/ajax', [PageController::class, 'ajax'])->name('ajax');

/*
|--------------------------------------------------------------------------
| Playground Page
|--------------------------------------------------------------------------
*/

Route::withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])->group(function () {

    // ── Email-based: /f/you@example.com ─────────────────────────────────
    // GET request - Show form endpoint info page (for playground)
    Route::get('/f/{email}', [PlaygroundController::class, 'formEndpointInfo'])
        ->name('playground.endpoint.info')
        ->where('email', '.+@.+');

    // POST request - Handle form submission to email endpoint (playground submission)
    Route::post('/f/{email}', [PlaygroundController::class, 'handleEmailSubmission'])
        ->name('playground.endpoint.submit')
        ->where('email', '.+@.+');

    // ── Slug-based: /f/my-contact-form ──────────────────────────────────
    // GET request - Show form (if you want to display the form)
    Route::get('/f/{slug}', [FormSubmissionController::class, 'show'])
        ->name('form.show')
        ->where('slug', '[^@]+');

    // POST request - Handle form submission (dashboard forms)
    Route::post('/f/{slug}', [FormSubmissionController::class, 'submit'])
        ->name('form.submit')
        ->where('slug', '[^@]+');

    // File upload endpoint for dashboard forms
    Route::post('/f/{slug}/upload', [FormSubmissionController::class, 'upload'])
        ->where('slug', '[^@]+');
});

/*
|--------------------------------------------------------------------------
| Playground Routes
|--------------------------------------------------------------------------
*/

Route::prefix('express')->name('playground.')->group(function () {
    Route::get('/', [PlaygroundController::class, 'index'])->name('index');
    Route::get('/guide', [PlaygroundController::class, 'expressGuide'])->name('Guide');
    Route::get('/terms', [ExpressController::class, 'terms'])->name('express.terms');
    Route::get('/privacy-policy', [ExpressController::class, 'privacyPolicy'])->name('express.privacy-policy');
    Route::get('/refund', [ExpressController::class, 'refundPolicy'])->name('express.refund');
    Route::post('/submit', [PlaygroundController::class, 'submit'])->name('submit');
    Route::get('/form-submitted', [PlaygroundController::class, 'formSubmitted'])->name('form.submitted');
    Route::get('/endpoint/{email}', [PlaygroundController::class, 'formEndpointInfo'])->name('endpoint.details');
    
    // Email verification
    Route::post('/verify-email', [PlaygroundController::class, 'verifyEmail'])->name('verify');
    Route::get('/confirm-email', [PlaygroundController::class, 'confirmEmail'])->name('confirm-email');
    Route::get('/check-verified', [PlaygroundController::class, 'checkVerified'])->name('check-verified');
    
    // Captcha routes - using existing captcha-page view
    Route::get('/captcha/{email}', [PlaygroundController::class, 'showCaptcha'])->name('show-captcha');
    Route::post('/captcha/{email}/verify', [PlaygroundController::class, 'verifyCaptcha'])->name('verify-captcha');
    
    // Email endpoint (for /f/email style submissions)
    Route::post('/f/{email}', [PlaygroundController::class, 'handleEmailSubmission'])->name('email-submit');
});


/*
|--------------------------------------------------------------------------
| Email Verification
|--------------------------------------------------------------------------
*/

Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verify'])
    ->name('verify.email');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login',           [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',          [AuthController::class, 'login']);
    Route::get('/signup',          [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup',         [AuthController::class, 'signup']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password',[AuthController::class, 'sendResetLink'])->name('password.email');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/reset-password-confirm', [AuthController::class, 'confirmPasswordReset'])
    ->name('password.reset.confirm');

Route::get('/auth/reset-password',  [AuthController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/auth/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');
Route::get('/signup-confirmed', function () {
    return view('pages.signup-confirmed', [
        'success' => true,
        'message' => 'Email verified successfully! You can now log in.',
    ]);
})->name('signup.confirmed');
Route::get('/account/verify', [AuthController::class, 'verifyAccount'])
    ->name('account.verify');
Route::get('/auth/reset-password-confirm-token', [AuthController::class, 'confirmPasswordResetFromToken'])
    ->name('password.reset.confirm.token');
/*
|--------------------------------------------------------------------------
| Google Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/auth/confirm', [AuthController::class, 'confirmEmail']);
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])
    ->where('provider', 'google|github|facebook')
    ->name('social.redirect');

Route::get('/auth/callback/{provider}', [SocialAuthController::class, 'callback'])
    ->where('provider', 'google|github|facebook')
    ->name('social.callback');




/*
|--------------------------------------------------------------------------
| Dashboard (Authenticated)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/forms/create',                   [DashboardController::class, 'createForm'])->name('dashboard.forms.create');
    Route::post('/forms',                          [DashboardController::class, 'storeForm'])->name('dashboard.forms.store');
    Route::get('/forms/{id}',                      [DashboardController::class, 'showForm'])->name('dashboard.forms.show');
    Route::get('/forms/{id}/edit',                 [DashboardController::class, 'editForm'])->name('dashboard.forms.edit');
    Route::put('/forms/{id}',                      [DashboardController::class, 'updateForm'])->name('dashboard.forms.update');
    Route::delete('/forms/{id}',                   [DashboardController::class, 'destroyForm'])->name('dashboard.forms.destroy');
    Route::get('/forms/{id}/export',               [DashboardController::class, 'exportSubmissions'])->name('dashboard.forms.export');
    Route::post('/forms/{id}/resend-verification', [DashboardController::class, 'resendVerification'])->name('dashboard.forms.resend-verification');

    // ── Submissions ──────────────────────────────────────────────────────
    Route::get('/forms/{formId}/submissions/{submissionId}',
        [DashboardController::class, 'showSubmission'])->name('dashboard.submissions.show');

    // Fixed: removed the erroneous /dashboard prefix inside the already-prefixed group
    Route::get('/forms/{formId}/submissions/{submissionId}/download',
        [FormSubmissionController::class, 'downloadFile'])->name('dashboard.submissions.download');

    Route::delete('/forms/{formId}/submissions/{submissionId}',
        [DashboardController::class, 'destroySubmission'])->name('dashboard.submissions.destroy');

    Route::post('/forms/{formId}/submissions/{submissionId}/spam',
        [DashboardController::class, 'markAsSpam'])->name('dashboard.submissions.spam');

    // ── Archive toggle (archive_when_paused setting) ──────────────────────
    Route::patch('/forms/{form}/toggle-archive',
        [FormSubmissionController::class, 'toggleArchive'])->name('dashboard.forms.toggle-archive');

    // ── Validations ──────────────────────────────────────────────────────
    Route::post('/forms/{formId}/validations',       [FormValidationController::class, 'store']);
    Route::put('/forms/{formId}/validations/{id}',   [FormValidationController::class, 'update']);
    Route::delete('/forms/{formId}/validations/{id}',[FormValidationController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Library
|--------------------------------------------------------------------------
*/

Route::get('/library',                       [LibraryController::class, 'Library'])->name('Home.library');
Route::get('/Application-forms',             [LibraryController::class, 'ApplicationForm'])->name('Home.library.ApplicationForm');
Route::get('/Tenant-Application-forms',      [LibraryController::class, 'TenantApplicationForm'])->name('Home.library.TenantApplicationForm');
Route::get('/Rental-Application-forms',      [LibraryController::class, 'RentalApplicationForm'])->name('Home.library.RentalApplicationForm');
Route::get('/Job-Application-forms',         [LibraryController::class, 'JobApplicationForm'])->name('Home.library.JobApplicationForm');
Route::get('/Scholarship-Application-forms', [LibraryController::class, 'ScholarshipApplicationForm'])->name('Home.library.ScholarshipApplicationForm');
Route::get('/Vendor-Application-forms',      [LibraryController::class, 'VendorApplicationForm'])->name('Home.library.VendorApplicationForm');
Route::get('/Internship-Application-forms',  [LibraryController::class, 'InternshipApplicationForm'])->name('Home.library.InternshipApplicationForm');
Route::get('/account', [PageController::class, 'AccountSettings'])
    ->name('account.settings')
    ->middleware('auth');

Route::delete('/account/delete', [AccountController::class, 'deleteAccount'])
    ->name('account.delete')
    ->middleware('auth');
Route::post('/account/update-password', [AccountController::class, 'updatePassword'])
    ->name('account.password.update')
    ->middleware('auth');


Route::get('/privacy', [PageController::class, 'privacyPolicy'])->name('pages.privacy-policy');
Route::get('/terms', [PageController::class, 'terms'])->name('pages.terms');
Route::get('/refund', [PageController::class, 'refundPolicy'])->name('pages.refund');

Route::get('/form-submit', [PageController::class, 'formSubmit'])->name('pages.form-submit');


/*
|--------------------------------------------------------------------------
| PADDLE
|--------------------------------------------------------------------------
*/
// Auth required — user must be logged in to subscribe
// 'verified' — user must have confirmed their email (optional, remove if not using)
Route::middleware(['auth', 'verified'])->group(function () {
 
    // Called by startCheckout() JS on pricing page
    // Receives { plan, billing } and returns { transaction_id }
    Route::post('/subscription/checkout', [CheckoutController::class, 'createCheckout'])
         ->name('subscription.checkout');
 
    // "Activating your plan..." page shown after Paddle overlay closes
    Route::get('/subscription/processing', [CheckoutController::class, 'processing'])
         ->name('subscription.processing');
 
    // Polled by processing page every 3s to check if webhook activated plan
    Route::get('/subscription/status', [CheckoutController::class, 'checkStatus'])
         ->name('subscription.status');
 
});
 
 
// ── BILLING PORTAL ROUTES ─────────────────────────────────────
// Auth required — only logged-in users can see their billing
Route::middleware(['auth', 'verified'])->prefix('billing')->name('billing.')->group(function () {
 
    // Main billing portal — shows plan, dates, invoices
    // View: resources/views/billing/portal.blade.php
    Route::get('/', [BillingController::class, 'index'])
         ->name('portal');
 
    // Cancel subscription (at period end — not immediately)
    Route::post('/cancel', [BillingController::class, 'cancel'])
         ->name('cancel');
 
    // Resume/reactivate a cancelled subscription (before period ends)
    Route::post('/resume', [BillingController::class, 'resume'])
         ->name('resume');
 
    // Upgrade, downgrade, or switch billing cycle (monthly ↔ annual)
    Route::post('/change-plan', [BillingController::class, 'changePlan'])
         ->name('change-plan');
 
    // Generate Paddle Customer Portal link → update payment method
    Route::get('/portal-link', [BillingController::class, 'portalLink'])
         ->name('portal-link');
 
});
 
 
// ── PADDLE WEBHOOK ────────────────────────────────────────────
// NO auth middleware   — Paddle is not a logged-in user
// NO 'verified' check — same reason
// Signature is verified inside WebhookController::handle() instead
// IMPORTANT: also add 'api/paddle/webhook' to VerifyCsrfToken $except
Route::post('/api/paddle/webhook', [WebhookController::class, 'handle'])
     ->name('paddle.webhook');


/*
|--------------------------------------------------------------------------
|  Payment history page (shows past transactions, invoices, etc.)
|--------------------------------------------------------------------------
*/
Route::get('/billing/payment-history', [App\Http\Controllers\PaymentHistoryController::class, 'index'])
     ->name('billing.payment-history')
     ->middleware('auth');

Route::get('/billing/invoice/{txnId}/pdf', [App\Http\Controllers\PaymentHistoryController::class, 'invoicePdf'])
     ->name('billing.invoice-pdf')
     ->middleware('auth');

Route::post('/cancel-scheduled-change', [BillingController::class, 'cancelScheduledChange'])
     ->name('billing.cancel-scheduled-change');


/*
|--------------------------------------------------------------------------
|  Team management
|--------------------------------------------------------------------------
*/
// ── Team management (owner actions) ──────────────────────────────────────────
Route::prefix('team')->name('team.')->middleware('auth')->group(function () {
    Route::get('/',                                    [TeamController::class, 'index'])             ->name('index');
    Route::post('/invite',                             [TeamController::class, 'invite'])            ->name('invite');
    Route::post('/invitation/{invitation}/resend',     [TeamController::class, 'resendInvitation'])  ->name('invitation.resend');
    Route::post('/invitation/{invitation}/cancel',     [TeamController::class, 'cancelInvitation'])  ->name('invitation.cancel');
    Route::post('/member/{member}/role',               [TeamController::class, 'updateRole'])        ->name('member.role');
    Route::delete('/member/{member}',                  [TeamController::class, 'removeMember'])      ->name('member.remove');
    Route::post('/switch',                             [TeamController::class, 'switchWorkspace'])   ->name('switch');
});
 
// ── Invitation accept/decline (no auth required for show, auth required for action) ──
Route::get('/team/accept/{token}',                     [TeamController::class, 'showAccept'])        ->name('team.accept');
Route::post('/team/accept/{token}',                    [TeamController::class, 'acceptInvitation'])  ->name('team.accept.confirm')->middleware('auth');
Route::post('/team/decline/{token}',                   [TeamController::class, 'declineInvitation']) ->name('team.decline')->middleware('auth');


/*
|--------------------------------------------------------------------------
|  Additional Emails 
|--------------------------------------------------------------------------
*/
Route::get('/Email-verified', [UserEmailController::class, 'userSecondEmailverified'])
     ->name('user.another.email-verified');
Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
 
    // Add new additional email
    Route::post('/emails',                    [UserEmailController::class, 'store'])
         ->name('email.store');
 
    // Resend verification to an additional email
    Route::post('/emails/{userEmail}/resend', [UserEmailController::class, 'resend'])
         ->name('email.resend');
 
    // Delete an additional email
    Route::delete('/emails/{userEmail}',      [UserEmailController::class, 'destroy'])
         ->name('email.destroy');
});
 
// Verify email — no auth required (user clicks link from email)
Route::get('/account/verify-email/{token}', [UserEmailController::class, 'verify'])
     ->name('account.email.verify');


/*
|--------------------------------------------------------------------------
|  Projects
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
 
    // ── Dashboard ────────────────────────────────────────────────────────────
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');
 
    // ── Projects ─────────────────────────────────────────────────────────────
    Route::prefix('dashboard/projects')->name('dashboard.projects.')->group(function () {
        Route::get('/create',        [App\Http\Controllers\ProjectController::class, 'create'])->name('create');
        Route::post('/',             [App\Http\Controllers\ProjectController::class, 'store'])->name('store');
        Route::get('/{id}',          [App\Http\Controllers\ProjectController::class, 'show'])->name('show');
        Route::get('/{id}/edit',     [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit');
        Route::put('/{id}',          [App\Http\Controllers\ProjectController::class, 'update'])->name('update');
        Route::delete('/{id}',       [App\Http\Controllers\ProjectController::class, 'destroy'])->name('destroy');
    });
 
    // ── Forms ─────────────────────────────────────────────────────────────────
    Route::prefix('dashboard/forms')->name('dashboard.forms.')->group(function () {
        Route::get('/create',             [App\Http\Controllers\DashboardController::class, 'createForm'])->name('create');
        Route::post('/',                  [App\Http\Controllers\DashboardController::class, 'storeForm'])->name('store');
        Route::get('/{id}',               [App\Http\Controllers\DashboardController::class, 'showForm'])->name('show');
        Route::get('/{id}/edit',          [App\Http\Controllers\DashboardController::class, 'editForm'])->name('edit');
        Route::put('/{id}',               [App\Http\Controllers\DashboardController::class, 'updateForm'])->name('update');
        Route::delete('/{id}',            [App\Http\Controllers\DashboardController::class, 'destroyForm'])->name('destroy');
        Route::get('/{id}/export',        [App\Http\Controllers\DashboardController::class, 'exportSubmissions'])->name('export');
        Route::post('/{id}/verify/resend',[App\Http\Controllers\DashboardController::class, 'resendVerification'])->name('verify.resend');
    });
 
    // ── Submissions ────────────────────────────────────────────────────────────
    Route::prefix('dashboard/forms/{formId}/submissions')->name('dashboard.submissions.')->group(function () {
        Route::get('/{id}',          [App\Http\Controllers\DashboardController::class, 'showSubmission'])->name('show');
        Route::delete('/{id}',       [App\Http\Controllers\DashboardController::class, 'destroySubmission'])->name('destroy');
        Route::post('/{id}/spam',    [App\Http\Controllers\DashboardController::class, 'markAsSpam'])->name('spam');
        Route::get('/{id}/download', [App\Http\Controllers\FormSubmissionController::class, 'downloadFile'])->name('download');
    });
 
});

Route::get('/land',          [App\Http\Controllers\PageController::class, 'Land'])->name('land');

Route::get('/features',          [App\Http\Controllers\PageController::class, 'Features'])->name('features');

Route::get('/core',          [App\Http\Controllers\CoreController::class, 'Core'])->name('core');