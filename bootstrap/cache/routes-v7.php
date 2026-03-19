<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/paddle/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cashier.webhook',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aaQvAhoqgyRYYQsF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/recaptcha-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'recaptcha.config',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'docs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pricing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pricing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground/form-submitted' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.form.submitted',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground/verify-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground/confirm-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.confirm-email',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/playground/check-verified' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.check-verified',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mIykfo2BCc6K31vV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'signup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TVD5e04gsBAuKZ4k',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/reset-password-confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signup-confirmed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'signup.confirmed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/reset-password-confirm-token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset.confirm.token',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PNT895Ll2Kid4cTW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/forms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/library' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.ApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Tenant-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.TenantApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Rental-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.RentalApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Job-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.JobApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Scholarship-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.ScholarshipApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Vendor-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.VendorApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/Internship-Application-forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'Home.library.InternshipApplicationForm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/privacy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.privacy-policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/terms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.terms',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/form-submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pages.form-submit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/subscription/checkout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscription.checkout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/subscription/processing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscription.processing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/subscription/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscription.status',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.portal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.cancel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/resume' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.resume',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/change-plan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.change-plan',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/portal-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.portal-link',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/paddle/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paddle.webhook',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/billing/payment-history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.payment-history',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cancel-scheduled-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.cancel-scheduled-change',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/f(?|orm(?|s/([^/]++)/(?|embed(*:37)|popup\\-config(*:57))|button/([^/]++)/widget\\.js(*:91))|/(?|(.+@.+)(?|(*:113))|([^@]+)(?|(*:132))|([^@]+)/upload(*:155)))|/captcha/([^/]++)(?|(*:185)|/verify(*:200))|/playground/(?|endpoint/([^/]++)(*:241)|captcha/([^/]++)(?|(*:268)|/verify(*:283))|f/([^/]++)(*:302))|/verify\\-email/([^/]++)(*:334)|/auth/(?|(google|github|facebook)(*:375)|callback/(google|github|facebook)(*:416))|/dashboard/forms/([^/]++)(?|(*:453)|/(?|e(?|dit(*:472)|xport(*:485))|resend\\-verification(*:514)|submissions/([^/]++)(?|(*:545)|/(?|download(*:565)|spam(*:577))|(*:586))|toggle\\-archive(*:610)|validations(?|(*:632)|/([^/]++)(?|(*:652))))|(*:663))|/billing/invoice/([^/]++)/pdf(*:701))/?$}sDu',
    ),
    3 => 
    array (
      37 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forms.embed',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      57 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forms.popup.save',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      91 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbutton.widget',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.endpoint.info',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'playground.endpoint.submit',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'form.show',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'form.submit',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5akgbB84EMRnsPIU',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      185 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'captcha.show',
          ),
          1 => 
          array (
            0 => 'formId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'captcha.verify',
          ),
          1 => 
          array (
            0 => 'formId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.endpoint.details',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.show-captcha',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      283 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.verify-captcha',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      302 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'playground.email-submit',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      334 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verify.email',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      375 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social.redirect',
          ),
          1 => 
          array (
            0 => 'provider',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      416 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social.callback',
          ),
          1 => 
          array (
            0 => 'provider',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      453 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      485 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.export',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      514 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.resend-verification',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.submissions.show',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'submissionId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      565 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.submissions.download',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'submissionId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      577 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.submissions.spam',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'submissionId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.submissions.destroy',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'submissionId',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.toggle-archive',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Wt0K9xqM4RXKoalf',
          ),
          1 => 
          array (
            0 => 'formId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      652 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WIbw7cQ4vBHSBOkE',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xWlfv4aVywY8eh0u',
          ),
          1 => 
          array (
            0 => 'formId',
            1 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard.forms.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'billing.invoice-pdf',
          ),
          1 => 
          array (
            0 => 'txnId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'cashier.webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'paddle/webhook',
      'action' => 
      array (
        'uses' => 'Laravel\\Paddle\\Http\\Controllers\\WebhookController@__invoke',
        'controller' => 'Laravel\\Paddle\\Http\\Controllers\\WebhookController',
        'as' => 'cashier.webhook',
        'namespace' => 'Laravel\\Paddle\\Http\\Controllers',
        'prefix' => 'paddle',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aaQvAhoqgyRYYQsF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:829:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'C:\\\\Git-folders\\\\000form.com\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"000000000000062c0000000000000000";}}',
        'as' => 'generated::aaQvAhoqgyRYYQsF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forms.embed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forms/{id}/embed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormButtonController@embed',
        'controller' => 'App\\Http\\Controllers\\FormButtonController@embed',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forms.embed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forms.popup.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forms/{id}/popup-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormButtonController@saveConfig',
        'controller' => 'App\\Http\\Controllers\\FormButtonController@saveConfig',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forms.popup.save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbutton.widget' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'formbutton/{slug}/widget.js',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FormButtonController@widget',
        'controller' => 'App\\Http\\Controllers\\FormButtonController@widget',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'formbutton.widget',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'recaptcha.config' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'recaptcha-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:119:"function () {
    return \\response()->json([
        \'sitekey\' => \\config(\'services.recaptcha.site_key\'),
    ]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005d70000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'recaptcha.config',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'captcha.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'captcha/{formId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@showCaptcha',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@showCaptcha',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'captcha.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'captcha.verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'captcha/{formId}/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@verifyCaptcha',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@verifyCaptcha',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'captcha.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@home',
        'controller' => 'App\\Http\\Controllers\\PageController@home',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'docs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@docs',
        'controller' => 'App\\Http\\Controllers\\PageController@docs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'docs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pricing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pricing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@pricing',
        'controller' => 'App\\Http\\Controllers\\PageController@pricing',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pricing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@ajax',
        'controller' => 'App\\Http\\Controllers\\PageController@ajax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.endpoint.info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'f/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@formEndpointInfo',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@formEndpointInfo',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'playground.endpoint.info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'email' => '.+@.+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.endpoint.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'f/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@handleEmailSubmission',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@handleEmailSubmission',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'playground.endpoint.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'email' => '.+@.+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'form.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'f/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@show',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'form.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'slug' => '[^@]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'form.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'f/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@submit',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@submit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'form.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'slug' => '[^@]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5akgbB84EMRnsPIU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'f/{slug}/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@upload',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@upload',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5akgbB84EMRnsPIU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'slug' => '[^@]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@index',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@index',
        'as' => 'playground.index',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'playground/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@submit',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@submit',
        'as' => 'playground.submit',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.form.submitted' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground/form-submitted',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@formSubmitted',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@formSubmitted',
        'as' => 'playground.form.submitted',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.endpoint.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground/endpoint/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@formEndpointInfo',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@formEndpointInfo',
        'as' => 'playground.endpoint.details',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'playground/verify-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@verifyEmail',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@verifyEmail',
        'as' => 'playground.verify',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.confirm-email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground/confirm-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@confirmEmail',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@confirmEmail',
        'as' => 'playground.confirm-email',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.check-verified' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground/check-verified',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@checkVerified',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@checkVerified',
        'as' => 'playground.check-verified',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.show-captcha' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'playground/captcha/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@showCaptcha',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@showCaptcha',
        'as' => 'playground.show-captcha',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.verify-captcha' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'playground/captcha/{email}/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@verifyCaptcha',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@verifyCaptcha',
        'as' => 'playground.verify-captcha',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'playground.email-submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'playground/f/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PlaygroundController@handleEmailSubmission',
        'controller' => 'App\\Http\\Controllers\\PlaygroundController@handleEmailSubmission',
        'as' => 'playground.email-submit',
        'namespace' => NULL,
        'prefix' => '/playground',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verify.email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify-email/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\EmailVerificationController@verify',
        'controller' => 'App\\Http\\Controllers\\EmailVerificationController@verify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verify.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@showLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@showLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mIykfo2BCc6K31vV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mIykfo2BCc6K31vV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'signup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@showSignup',
        'controller' => 'App\\Http\\Controllers\\AuthController@showSignup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'signup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TVD5e04gsBAuKZ4k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@signup',
        'controller' => 'App\\Http\\Controllers\\AuthController@signup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::TVD5e04gsBAuKZ4k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@showForgotPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@showForgotPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@sendResetLink',
        'controller' => 'App\\Http\\Controllers\\AuthController@sendResetLink',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/reset-password-confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@confirmPasswordReset',
        'controller' => 'App\\Http\\Controllers\\AuthController@confirmPasswordReset',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\AuthController@showResetForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'auth/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\AuthController@resetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'signup.confirmed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signup-confirmed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:173:"function () {
    return \\view(\'pages.signup-confirmed\', [
        \'success\' => true,
        \'message\' => \'Email verified successfully! You can now log in.\',
    ]);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005f90000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'signup.confirmed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@verifyAccount',
        'controller' => 'App\\Http\\Controllers\\AuthController@verifyAccount',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset.confirm.token' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/reset-password-confirm-token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@confirmPasswordResetFromToken',
        'controller' => 'App\\Http\\Controllers\\AuthController@confirmPasswordResetFromToken',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset.confirm.token',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PNT895Ll2Kid4cTW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@confirmEmail',
        'controller' => 'App\\Http\\Controllers\\AuthController@confirmEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PNT895Ll2Kid4cTW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social.redirect' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/{provider}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SocialAuthController@redirect',
        'controller' => 'App\\Http\\Controllers\\SocialAuthController@redirect',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'social.redirect',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'provider' => 'google|github|facebook',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social.callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/callback/{provider}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SocialAuthController@callback',
        'controller' => 'App\\Http\\Controllers\\SocialAuthController@callback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'social.callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'provider' => 'google|github|facebook',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@createForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@createForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@storeForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@storeForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@showForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@showForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@editForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@editForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/forms/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@updateForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@updateForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/forms/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@destroyForm',
        'controller' => 'App\\Http\\Controllers\\DashboardController@destroyForm',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/{id}/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@exportSubmissions',
        'controller' => 'App\\Http\\Controllers\\DashboardController@exportSubmissions',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.resend-verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/forms/{id}/resend-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@resendVerification',
        'controller' => 'App\\Http\\Controllers\\DashboardController@resendVerification',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.resend-verification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.submissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/{formId}/submissions/{submissionId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@showSubmission',
        'controller' => 'App\\Http\\Controllers\\DashboardController@showSubmission',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.submissions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.submissions.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/forms/{formId}/submissions/{submissionId}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@downloadFile',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@downloadFile',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.submissions.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.submissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/forms/{formId}/submissions/{submissionId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@destroySubmission',
        'controller' => 'App\\Http\\Controllers\\DashboardController@destroySubmission',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.submissions.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.submissions.spam' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/forms/{formId}/submissions/{submissionId}/spam',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@markAsSpam',
        'controller' => 'App\\Http\\Controllers\\DashboardController@markAsSpam',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.submissions.spam',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard.forms.toggle-archive' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dashboard/forms/{form}/toggle-archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormSubmissionController@toggleArchive',
        'controller' => 'App\\Http\\Controllers\\FormSubmissionController@toggleArchive',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'dashboard.forms.toggle-archive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Wt0K9xqM4RXKoalf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/forms/{formId}/validations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormValidationController@store',
        'controller' => 'App\\Http\\Controllers\\FormValidationController@store',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'generated::Wt0K9xqM4RXKoalf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WIbw7cQ4vBHSBOkE' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/forms/{formId}/validations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormValidationController@update',
        'controller' => 'App\\Http\\Controllers\\FormValidationController@update',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'generated::WIbw7cQ4vBHSBOkE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xWlfv4aVywY8eh0u' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/forms/{formId}/validations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\FormValidationController@destroy',
        'controller' => 'App\\Http\\Controllers\\FormValidationController@destroy',
        'namespace' => NULL,
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
        'as' => 'generated::xWlfv4aVywY8eh0u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'library',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@Library',
        'controller' => 'App\\Http\\Controllers\\LibraryController@Library',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.ApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@ApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@ApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.ApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.TenantApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Tenant-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@TenantApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@TenantApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.TenantApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.RentalApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Rental-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@RentalApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@RentalApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.RentalApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.JobApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Job-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@JobApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@JobApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.JobApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.ScholarshipApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Scholarship-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@ScholarshipApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@ScholarshipApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.ScholarshipApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.VendorApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Vendor-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@VendorApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@VendorApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.VendorApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'Home.library.InternshipApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'Internship-Application-forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LibraryController@InternshipApplicationForm',
        'controller' => 'App\\Http\\Controllers\\LibraryController@InternshipApplicationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'Home.library.InternshipApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@AccountSettings',
        'controller' => 'App\\Http\\Controllers\\PageController@AccountSettings',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'account/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AccountController@deleteAccount',
        'controller' => 'App\\Http\\Controllers\\AccountController@deleteAccount',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'account/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\AccountController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\AccountController@updatePassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.privacy-policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'privacy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@privacyPolicy',
        'controller' => 'App\\Http\\Controllers\\PageController@privacyPolicy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pages.privacy-policy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.terms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'terms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@terms',
        'controller' => 'App\\Http\\Controllers\\PageController@terms',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pages.terms',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pages.form-submit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'form-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@formSubmit',
        'controller' => 'App\\Http\\Controllers\\PageController@formSubmit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pages.form-submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscription.checkout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'subscription/checkout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckoutController@createCheckout',
        'controller' => 'App\\Http\\Controllers\\CheckoutController@createCheckout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subscription.checkout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscription.processing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'subscription/processing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckoutController@processing',
        'controller' => 'App\\Http\\Controllers\\CheckoutController@processing',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subscription.processing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscription.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'subscription/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\CheckoutController@checkStatus',
        'controller' => 'App\\Http\\Controllers\\CheckoutController@checkStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subscription.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.portal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@index',
        'controller' => 'App\\Http\\Controllers\\BillingController@index',
        'as' => 'billing.portal',
        'namespace' => NULL,
        'prefix' => '/billing',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.cancel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'billing/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@cancel',
        'controller' => 'App\\Http\\Controllers\\BillingController@cancel',
        'as' => 'billing.cancel',
        'namespace' => NULL,
        'prefix' => '/billing',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.resume' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'billing/resume',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@resume',
        'controller' => 'App\\Http\\Controllers\\BillingController@resume',
        'as' => 'billing.resume',
        'namespace' => NULL,
        'prefix' => '/billing',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.change-plan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'billing/change-plan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@changePlan',
        'controller' => 'App\\Http\\Controllers\\BillingController@changePlan',
        'as' => 'billing.change-plan',
        'namespace' => NULL,
        'prefix' => '/billing',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.portal-link' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing/portal-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@portalLink',
        'controller' => 'App\\Http\\Controllers\\BillingController@portalLink',
        'as' => 'billing.portal-link',
        'namespace' => NULL,
        'prefix' => '/billing',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paddle.webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/paddle/webhook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WebhookController@handle',
        'controller' => 'App\\Http\\Controllers\\WebhookController@handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paddle.webhook',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.payment-history' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing/payment-history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentHistoryController@index',
        'controller' => 'App\\Http\\Controllers\\PaymentHistoryController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing.payment-history',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.invoice-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'billing/invoice/{txnId}/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentHistoryController@invoicePdf',
        'controller' => 'App\\Http\\Controllers\\PaymentHistoryController@invoicePdf',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing.invoice-pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'billing.cancel-scheduled-change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'cancel-scheduled-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\BillingController@cancelScheduledChange',
        'controller' => 'App\\Http\\Controllers\\BillingController@cancelScheduledChange',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'billing.cancel-scheduled-change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
