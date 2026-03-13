<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use App\Models\Form;
use App\Models\Submission;
use App\Services\SpamDetectionService;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\Models\FormValidation;
use App\Services\FormValidationService;
use Illuminate\Support\Facades\Validator;

class FormSubmissionController extends Controller
{
    protected SpamDetectionService $spamDetector;
    protected RecaptchaService $recaptcha;

    public function __construct(SpamDetectionService $spamDetector, RecaptchaService $recaptcha)
    {
        $this->spamDetector = $spamDetector;
        $this->recaptcha    = $recaptcha;
    }

    // =========================================================================
    // MAIN SUBMIT ENTRY POINT
    // =========================================================================
    public function submit(Request $request, string $slug)
    {
        Log::info('=== FORM SUBMISSION STARTED ===', ['slug' => $slug, 'method' => $request->method()]);
        Log::info('Request data:', $request->except(['_token', 'g-recaptcha-response']));
        Log::info('Has files:', ['files' => count($request->allFiles())]);

        $form = Form::where('slug', $slug)->first();

        if (!$form) {
            Log::error('Form not found', ['slug' => $slug]);
            return $this->errorResponse($request, 'Form not found', 404);
        }

        Log::info('Form found', ['form_id' => $form->id, 'form_name' => $form->name]);

        if ($form->status === 'paused') {
            Log::info('Form is paused', ['form_id' => $form->id]);

            if ($form->archive_when_paused ?? true) {
                $this->storeArchivedSubmission($request, $form);
            }

            return $this->pausedResponse($request);
        }

        if (!$form->email_verified) {
            Log::warning('Form email not verified', ['form_id' => $form->id]);
            return $this->errorResponse($request, 'Form email not verified', 403);
        }

        if (!$form->canAcceptSubmissions()) {
            Log::warning('Form not accepting submissions', ['form_id' => $form->id]);
            return $this->errorResponse($request, 'Form is not accepting submissions', 403);
        }

        if (!$form->isDomainAllowed($request->header('Referer'))) {
            Log::warning('Domain not allowed', ['referer' => $request->header('Referer')]);
            return $this->errorResponse($request, 'Submissions from this domain are not allowed', 403);
        }

        $allData = $request->except(['_token']);

        $isCaptchaVerified = $request->has('captcha_verified') || !empty($request->input('captcha_verified'));

        $clientIp = $request->ip() ?? $request->getClientIp() ?? '0.0.0.0';

        if (!$isCaptchaVerified && !$this->recaptcha->isDisabledByUser($allData)) {

            Log::info('Redirecting to captcha page', ['form_id' => $form->id]);

            $dataForSession = $request->except(['_token']);

            foreach ($request->allFiles() as $field => $file) {
                unset($dataForSession[$field]);
            }

            Session::put('pending_submission_' . $form->id, [
                'data'       => $dataForSession,
                'files'      => $this->storeTempFiles($request, $form),
                'ip'         => $clientIp,
                'user_agent' => $request->userAgent(),
                'referrer'   => $request->header('Referer'),
                'timestamp'  => now()->toDateTimeString(),
            ]);

            if ($request->wantsJson() || $request->input('_format') === 'json') {
                return response()->json([
                    'redirect' => route('captcha.show', $form->id)
                ]);
            }

            return redirect()->route('captcha.show', $form->id);
        }

        /*
        |--------------------------------------------------------------------------
        | CLEAN SUBMISSION DATA
        |--------------------------------------------------------------------------
        */

        $internalFields = [
            '_token',
            '_gotcha',
            '_honeypot',
            '_next',
            '_format',
            '_form_load_time',
            '_cc',
            '_captcha',
            'g-recaptcha-response',
            'captcha_verified'
        ];

        $submissionData = [];

        foreach ($allData as $key => $value) {
            if (!in_array($key, $internalFields) && !$request->hasFile($key)) {
                $submissionData[$key] = $value;
            }
        }

        Log::info('Clean submission data', $submissionData);

        /*
        |--------------------------------------------------------------------------
        | FILE UPLOADS
        |--------------------------------------------------------------------------
        */

        [$uploadedFiles, $uploadMetadata, $fileError] =
            $this->handleFileUploads($request, $form, $internalFields);

        if ($fileError) {
            return $this->errorResponse($request, $fileError);
        }

        if (!empty($uploadMetadata)) {
            $submissionData['uploads'] = $uploadMetadata;
        }

        /*
        |--------------------------------------------------------------------------
        | SPAM DETECTION
        |--------------------------------------------------------------------------
        */

        $spamResult = $this->spamDetector->isSpam($form, $request, $submissionData) ?? [];
        $isSpam     = $spamResult['is_spam'] ?? false;
        $spamReason = $spamResult['reason'] ?? null;

        Log::info('Spam detection result', [
            'is_spam' => $isSpam,
            'reason'  => $spamReason,
        ]);

        /*
        |--------------------------------------------------------------------------
        | STORE SUBMISSION
        |--------------------------------------------------------------------------
        */

        $submission = Submission::create([
            'form_id'    => $form->id,
            'data'       => $submissionData,
            'metadata'   => [
                'has_attachment'   => !empty($uploadedFiles),
                'attachment_count' => count($uploadedFiles),
                'attachments'      => $uploadMetadata,
            ],
            'ip_address' => $clientIp,
            'user_agent' => $request->userAgent(),
            'referrer'   => $request->header('Referer'),
            'is_spam'    => $isSpam,
            'spam_reason' => $spamReason,
        ]);

        Log::info('Submission stored', ['id' => $submission->id]);

        /*
        |--------------------------------------------------------------------------
        | SEND ADMIN EMAIL
        |--------------------------------------------------------------------------
        */

        if (!$isSpam) {

            $this->sendNotificationEmail(
                $form,
                $allData,
                $submissionData,
                $submission,
                $uploadedFiles,
                $uploadMetadata
            );

            if ($form->auto_response_enabled) {
                $this->sendAutoResponse($form, $submissionData);
            }

        } else {
            Log::warning('Spam submission detected. Email not sent.');
        }

        /*
        |--------------------------------------------------------------------------
        | CLEAN TEMP FILES + FLASH ORIGINAL FORM REFERRER
        |--------------------------------------------------------------------------
        */

        // Grab the original form URL before clearing the session.
        // - Direct submit (no captcha): HTTP Referer header = the form page.
        // - Captcha flow: HTTP Referer = captcha page (wrong), so use the
        //   referrer stored in the pending session when the form was first submitted.
        $formReferrer = $request->header('Referer') ?? $request->server('HTTP_REFERER');

        if (Session::has('pending_submission_' . $form->id)) {

            $pending = Session::get('pending_submission_' . $form->id);

            if (!empty($pending['files'])) {
                $this->cleanupTempFiles($pending['files']);
            }

            if (!empty($pending['referrer'])) {
                $formReferrer = $pending['referrer'];
            }

            Session::forget('pending_submission_' . $form->id);
        }

        Session::flash('form_referrer', $formReferrer);

        /*
        |--------------------------------------------------------------------------
        | SUCCESS RESPONSE
        |--------------------------------------------------------------------------
        */

        return $this->successResponse($request, $form, $allData);
    }

    // =========================================================================
    // TOGGLE archive_when_paused SETTING
    // =========================================================================

    public function toggleArchive(Request $request, Form $form)
    {
        $newValue = $request->boolean('archive_when_paused');

        $form->update(['archive_when_paused' => $newValue]);

        Log::info('Form #' . $form->id . ' archive_when_paused → ' . ($newValue ? 'ON' : 'OFF'));

        return back()->with('success', 'Archive setting updated.');
    }

    // =========================================================================
    // CAPTCHA INTERSTITIAL METHODS
    // =========================================================================

    public function showCaptcha($formId)
    {
        Log::info('Showing captcha page', ['form_id' => $formId]);

        $form = Form::findOrFail($formId);

        if (!Session::has('pending_submission_' . $form->id)) {
            Log::warning('No pending submission found', ['form_id' => $formId]);
            return redirect()->route('home')->with('error', 'No pending submission found.');
        }

        return view('captcha-page', [
            'form'    => $form,
            'siteKey' => config('services.recaptcha.site_key'),
        ]);
    }

    public function verifyCaptcha(Request $request, $formId)
    {
        Log::info('=== CAPTCHA VERIFICATION STARTED ===', ['form_id' => $formId]);

        $form = Form::findOrFail($formId);

        $token    = $request->input('g-recaptcha-response');
        $clientIp = $request->ip() ?? $request->getClientIp() ?? '0.0.0.0';

        Log::info('Verifying captcha', ['token_exists' => !empty($token), 'ip' => $clientIp]);

        if ($this->recaptcha->verify($token, $clientIp)) {
            Log::info('Captcha verified successfully');

            $pending = Session::get('pending_submission_' . $form->id);

            if ($pending) {
                Log::info('Pending submission found', [
                    'data_keys'  => array_keys($pending['data'] ?? []),
                    'stored_ip'  => $pending['ip'] ?? 'not stored',
                    'current_ip' => $clientIp,
                ]);

                $storedData      = $pending['data'];
                $storedFiles     = $pending['files'] ?? [];
                $storedIp        = $pending['ip'] ?? $clientIp;
                $storedUserAgent = $pending['user_agent'] ?? $request->userAgent();
                $storedReferrer  = $pending['referrer'] ?? $request->header('Referer');

                $storedData['captcha_verified'] = true;
                Session::flash('had_captcha', true);
                unset($storedData['g-recaptcha-response']);

                $newRequest = $this->recreateRequestWithFiles(
                    $storedData,
                    $storedFiles,
                    $form,
                    $storedIp,
                    $storedUserAgent,
                    $storedReferrer
                );

                Log::info('Recreated request', [
                    'has_files' => count($newRequest->allFiles()),
                    'ip'        => $storedIp,
                ]);

                return $this->submit($newRequest, $form->slug);
            } else {
                Log::warning('No pending submission found after captcha verification');
            }
        } else {
            Log::warning('Captcha verification failed');
        }

        Log::info('=== CAPTCHA VERIFICATION FAILED ===');

        return redirect()->back()->with('error', 'Captcha verification failed. Please try again.');
    }

    /**
     * Store uploaded files temporarily
     */
    private function storeTempFiles(Request $request, $form): array
    {
        $files = [];

        foreach ($request->allFiles() as $field => $file) {
            if (is_array($file)) {
                foreach ($file as $index => $singleFile) {
                    if ($singleFile && $singleFile->isValid()) {
                        $path = $singleFile->store('temp/' . $form->id . '/' . uniqid(), 'local');
                        $files[$field . '[]'][] = $path;
                        Log::info('Temp file stored', ['field' => $field, 'path' => $path]);
                    }
                }
            } else {
                if ($file && $file->isValid()) {
                    $path = $file->store('temp/' . $form->id . '/' . uniqid(), 'local');
                    $files[$field][] = $path;
                    Log::info('Temp file stored', ['field' => $field, 'path' => $path]);
                }
            }
        }

        return $files;
    }

    /**
     * Recreate a request with files from temporary storage.
     */
    private function recreateRequestWithFiles(
        array   $data,
        array   $tempFiles,
        Form    $form,
        string  $ip = '0.0.0.0',
        ?string $userAgent = null,
        ?string $referrer = null,
        bool    $isAjax = false
    ): Request {

        Log::info('Recreating request with files', [
            'temp_files' => $tempFiles,
            'ip'         => $ip,
            'is_ajax'    => $isAjax,
        ]);

        $request = Request::create('/' . $form->slug, 'POST', $data);

        $request->server->set('REMOTE_ADDR', $ip);

        if ($userAgent) {
            $request->headers->set('User-Agent', $userAgent);
        }

        if ($referrer) {
            $request->headers->set('Referer', $referrer);
        }

        if ($isAjax) {
            $request->headers->set('X-Requested-With', 'XMLHttpRequest');
            $request->headers->set('Accept', 'application/json');
        }

        foreach ($tempFiles as $field => $paths) {

            $uploadedFiles = [];

            foreach ($paths as $path) {

                $fullPath = storage_path('app/' . $path);

                if (file_exists($fullPath)) {

                    $file = new UploadedFile(
                        $fullPath,
                        basename($path),
                        mime_content_type($fullPath),
                        null,
                        true
                    );

                    $uploadedFiles[] = $file;

                    Log::info('Restored file from temp', [
                        'field' => $field,
                        'path'  => $path,
                    ]);
                } else {
                    Log::warning('Temp file missing during request recreation', [
                        'field' => $field,
                        'path'  => $fullPath,
                    ]);
                }
            }

            if (str_contains($field, '[]')) {
                $fieldName = str_replace('[]', '', $field);
                $request->files->set($fieldName, $uploadedFiles);
            } else {
                $request->files->set($field, $uploadedFiles[0] ?? null);
            }
        }

        return $request;
    }

    /**
     * Clean up temporary files after successful submission
     */
    private function cleanupTempFiles(array $tempFiles): void
    {
        foreach ($tempFiles as $paths) {
            foreach ($paths as $path) {
                $fullPath = storage_path('app/' . $path);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                    Log::info('Temp file cleaned up', ['path' => $path]);
                }
            }
        }
    }

    // =========================================================================
    // PRIVATE: STORE PAUSED-FORM SUBMISSION IN ARCHIVE
    // =========================================================================

    private function storeArchivedSubmission(Request $request, Form $form): void
    {
        $allData        = $request->except(['_token']);
        $internalFields = ['_gotcha', '_honeypot', '_next', '_format', '_form_load_time', '_cc', '_captcha'];
        $submissionData = [];

        foreach ($allData as $key => $value) {
            if (!in_array($key, $internalFields) && !$request->hasFile($key)) {
                // Skip dynamic honeypot fields (e.g. honeypot_1ogCBVw5)
                if (str_starts_with($key, 'honeypot_')) continue;
                $submissionData[$key] = $value;
            }
        }

        $uploadedFiles  = [];
        $uploadMetadata = [];

        foreach ($request->allFiles() as $fieldName => $files) {
            if (in_array($fieldName, $internalFields)) {
                continue;
            }

            $filesArray = is_array($files) ? $files : [$files];

            foreach ($filesArray as $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }

                $maxBytes = ($form->max_file_size ?? 10) * 1024 * 1024;
                if ($file->getSize() > $maxBytes) {
                    Log::warning('Archived sub: file skipped (too large) - ' . $file->getClientOriginalName());
                    continue;
                }

                $originalName = $file->getClientOriginalName();
                $safeName     = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $originalName);
                $filename     = time() . '_' . uniqid() . '_' . $safeName;

                try {
                    $path         = $file->storeAs('uploads/' . $form->id, $filename, 'public');
                    $absolutePath = Storage::disk('public')->path($path);

                    $meta = [
                        'name'          => $originalName,
                        'filename'      => $filename,
                        'path'          => $path,
                        'absolute_path' => $absolutePath,
                        'size'          => $file->getSize(),
                        'type'          => $file->getMimeType(),
                        'extension'     => $file->getClientOriginalExtension(),
                        'field_name'    => $fieldName,
                    ];

                    $uploadedFiles[]  = $absolutePath;
                    $uploadMetadata[] = $meta;
                } catch (\Exception $e) {
                    Log::error('Archived sub file upload failed: ' . $e->getMessage());
                }
            }
        }

        if (!empty($uploadMetadata)) {
            $submissionData['uploads'] = $uploadMetadata;
        }

        $metadata = [
            'subject'          => $allData['_subject'] ?? null,
            'replyto'          => $allData['_replyto'] ?? $allData['email'] ?? null,
            'template'         => $allData['_template'] ?? 'basic',
            'has_attachment'   => !empty($uploadedFiles),
            'attachment_count' => count($uploadedFiles),
            'attachments'      => $uploadMetadata,
            'archived_reason'  => 'form_paused',
        ];

        try {
            $clientIp = $request->ip() ?? $request->getClientIp() ?? '0.0.0.0';

            $sub = Submission::create([
                'form_id'     => $form->id,
                'data'        => $submissionData,
                'metadata'    => $metadata,
                'ip_address'  => $clientIp,
                'user_agent'  => $request->userAgent(),
                'referrer'    => $request->header('Referer'),
                'is_spam'     => false,
                'is_archived' => true,
                'spam_reason' => null,
            ]);

            Log::info('Archived submission stored (form paused): ID ' . $sub->id . ' IP: ' . $clientIp);
        } catch (\Exception $e) {
            Log::error('Failed to store archived submission: ' . $e->getMessage());
        }
    }

    // =========================================================================
    // PRIVATE: FILE UPLOAD HANDLER
    // =========================================================================

    private function handleFileUploads(Request $request, Form $form, array $internalFields): array
    {
        $uploadedFiles  = [];
        $uploadMetadata = [];

        Log::info('FILE UPLOAD CHECK', ['all_files' => array_keys($request->allFiles())]);

        $maxFiles   = $form->max_files ?? 5;
        $totalFiles = 0;

        foreach ($request->allFiles() as $files) {
            $totalFiles += is_array($files) ? count($files) : 1;
        }

        if ($totalFiles > $maxFiles) {
            return [[], [], "Maximum {$maxFiles} files allowed. You uploaded {$totalFiles} files."];
        }

        foreach ($request->allFiles() as $fieldName => $files) {
            if (in_array($fieldName, $internalFields)) {
                continue;
            }

            $filesArray = is_array($files) ? $files : [$files];

            foreach ($filesArray as $file) {
                if (!$file || !$file->isValid()) {
                    continue;
                }

                Log::info('File detected in field: ' . $fieldName);

                $maxBytes = ($form->max_file_size ?? 10) * 1024 * 1024;
                $fileSize = $file->getSize();

                if ($fileSize > $maxBytes) {
                    $maxMB = $maxBytes / 1024 / 1024;
                    $error = "File too large. Maximum size is {$maxMB}MB. Your file: "
                           . round($fileSize / 1024 / 1024, 2) . "MB";
                    Log::error($error);
                    return [[], [], $error];
                }

                $originalName = $file->getClientOriginalName();
                $safeName     = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $originalName);
                $filename     = time() . '_' . uniqid() . '_' . $safeName;

                try {
                    $path         = $file->storeAs('uploads/' . $form->id, $filename, 'public');
                    $absolutePath = Storage::disk('public')->path($path);

                    $meta = [
                        'name'          => $originalName,
                        'filename'      => $filename,
                        'path'          => $path,
                        'absolute_path' => $absolutePath,
                        'size'          => $fileSize,
                        'type'          => $file->getMimeType(),
                        'extension'     => $file->getClientOriginalExtension(),
                        'field_name'    => $fieldName,
                    ];

                    $uploadedFiles[]  = $absolutePath;
                    $uploadMetadata[] = $meta;

                    Log::info('FILE UPLOADED', [
                        'original_name' => $meta['name'],
                        'stored_as'     => $meta['filename'],
                        'size'          => $meta['size'] . ' bytes',
                        'field'         => $fieldName,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to store file: ' . $e->getMessage());
                    return [[], [], 'Failed to upload file. Please try again.'];
                }
            }
        }

        return [$uploadedFiles, $uploadMetadata, null];
    }

    // =========================================================================
    // PRIVATE: SEND NOTIFICATION EMAIL
    // =========================================================================

    private function sendNotificationEmail(
        Form        $form,
        array       $allData,
        array       $submissionData,
        ?Submission $submission,
        array       $uploadedFiles,
        array       $uploadMetadata
    ): void {
        try {
            Log::info('=== SENDING NOTIFICATION EMAIL ===', [
                'to'            => $form->recipient_email,
                'submission_id' => $submission?->id,
                'has_files'     => !empty($uploadedFiles),
                'file_count'    => count($uploadedFiles),
                'file_paths'    => $uploadedFiles,
            ]);

            $ccEmails = [];

            if (!empty($form->cc_emails)) {
                $ccEmails = is_string($form->cc_emails)
                    ? array_map('trim', explode(',', $form->cc_emails))
                    : $form->cc_emails;
                Log::info('CC emails from form', ['cc_emails' => $ccEmails]);
            }

            if (!empty($allData['_cc'])) {
                $extraCc  = array_map('trim', explode(',', $allData['_cc']));
                $ccEmails = array_merge($ccEmails, $extraCc);
                Log::info('CC emails from _cc field', ['extra_cc' => $extraCc]);
            }

            $ccEmails = array_values(array_unique(
                array_filter($ccEmails, fn($e) => !empty($e) && filter_var($e, FILTER_VALIDATE_EMAIL))
            ));

            Log::info('Final CC emails', ['final_list' => $ccEmails]);

            if (!filter_var($form->recipient_email, FILTER_VALIDATE_EMAIL)) {
                Log::error('Invalid recipient email', ['email' => $form->recipient_email]);
                return;
            }

            $verifiedFiles    = [];
            $verifiedMetadata = [];

            foreach ($uploadedFiles as $index => $filePath) {
                if (file_exists($filePath)) {
                    $verifiedFiles[]    = $filePath;
                    $verifiedMetadata[] = $uploadMetadata[$index] ?? [];
                } else {
                    Log::warning('Attachment file missing before mail build', [
                        'path'  => $filePath,
                        'index' => $index,
                    ]);
                }
            }

            Log::info('Verified attachment paths', [
                'verified_count' => count($verifiedFiles),
                'paths'          => $verifiedFiles,
            ]);

            $mail = new FormSubmissionMail(
                $form,
                $submissionData,
                $submission,
                $verifiedFiles,
                $verifiedMetadata
            );

            Log::info('Mail object created');

            if (!empty($ccEmails)) {
                Log::info('Sending email with CC', ['to' => $form->recipient_email, 'cc' => $ccEmails]);
                Mail::to($form->recipient_email)->cc($ccEmails)->send($mail);
            } else {
                Log::info('Sending email without CC', ['to' => $form->recipient_email]);
                Mail::to($form->recipient_email)->send($mail);
            }

            Log::info('Mail send method called successfully');

            if ($submission) {
                $submission->update([
                    'email_sent'    => true,
                    'email_sent_at' => now(),
                ]);
                Log::info('Submission updated with email_sent flag');
            }

            Log::info('Email sent successfully to: ' . $form->recipient_email);
        } catch (\Exception $e) {
            Log::error('=== EMAIL SENDING FAILED ===', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file'  => $e->getFile(),
                'line'  => $e->getLine(),
            ]);
        }
    }

    // =========================================================================
    // PRIVATE: AUTO-RESPONSE TO VISITOR
    // =========================================================================

    private function sendAutoResponse(Form $form, array $submissionData): void
    {
        try {
            $visitorEmail = $form->getVisitorEmail($submissionData);

            if (!$visitorEmail) {
                Log::warning('Auto-response: No email field found');
                return;
            }

            $defaultMessage =
                "Dear {visitor_name},\n\n" .
                "Thank you for contacting us! We have received your submission and will get back to you shortly.\n\n" .
                "Best regards,\n" . config('app.name');

            $messageContent = $form->auto_response_message ?? $defaultMessage;
            $messageContent = $form->parseAutoResponseMessage($messageContent, $submissionData);

            $mail = new \App\Mail\AutoResponseMail($form, $submissionData, $messageContent);
            Mail::to($visitorEmail)->send($mail);

            Log::info('Auto-response sent to: ' . $visitorEmail);
        } catch (\Exception $e) {
            Log::error('Auto-response failed: ' . $e->getMessage());
        }
    }

    // =========================================================================
    // RESPONSES
    // =========================================================================

    private function pausedResponse(Request $request)
    {
        $message = 'The owner of this form has disabled this form and it is no longer accepting submissions';

        if ($request->wantsJson() || $request->input('_format') === 'json') {
            return response()->json(['success' => false, 'error' => $message], 403);
        }

        return response()->view('pages.form-not-active', ['message' => $message], 403);
    }

    protected function successResponse(Request $request, Form $form, array $data)
    {
        Log::info('Success response', [
            'wants_json'   => $request->wantsJson(),
            'format'       => $request->input('_format'),
            'redirect_url' => $data['_next'] ?? $form->redirect_url,
        ]);

        if ($request->wantsJson() || $request->input('_format') === 'json') {
            return response()->json(['success' => true, 'message' => $form->success_message]);
        }

        $redirectUrl = $data['_next'] ?? $form->redirect_url;

        if ($redirectUrl) {
            Log::info('Redirecting to', ['url' => $redirectUrl]);
            return redirect()->away($redirectUrl);
        }

        return view('pages.thank-you', [
            'message' => $form->success_message,
            'referer' => session('form_referrer'),
        ]);
    }

    protected function errorResponse(Request $request, string $message, int $status = 422)
    {
        Log::warning('Error response', ['message' => $message, 'status' => $status]);

        if ($request->wantsJson() || $request->input('_format') === 'json') {
            return response()->json(['success' => false, 'error' => $message], $status);
        }

        return back()->with('error', $message)->withInput();
    }

    // =========================================================================
    // FILE DOWNLOAD
    // =========================================================================

    public function downloadFile(Request $request, $formId, $submissionId)
    {
        $submission = Submission::where('form_id', $formId)->findOrFail($submissionId);

        $fileIndex = $request->input('file_index', 0);
        $uploads   = $submission->data['uploads'] ?? null;

        if (!$uploads || !is_array($uploads) || !isset($uploads[$fileIndex])) {
            abort(404, 'File not found');
        }

        $fileData = $uploads[$fileIndex];

        if (!isset($fileData['absolute_path'])) {
            abort(404, 'File path not found');
        }

        $filePath = $fileData['absolute_path'];

        if (!file_exists($filePath)) {
            abort(404, 'File does not exist on server');
        }

        if ($request->has('preview')) {
            return response()->file($filePath, [
                'Content-Type' => $fileData['type'] ?? 'application/octet-stream',
            ]);
        }

        return response()->download(
            $filePath,
            $fileData['name'] ?? 'file',
            ['Content-Type' => $fileData['type'] ?? 'application/octet-stream']
        );
    }
}