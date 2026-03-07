<?php

return [

    /*
     * You can enable CORS for 1 or multiple URLs, using wildcards.
     */
    'paths' => [
        'api/*',
        'f/*',          // popup widget submissions
        'widget/f/*',   // backup widget route
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    /*
     * Must be false when allowed_origins is '*'
     * Setting to true would require specific origins, not wildcard
     */
    'supports_credentials' => false,

];