<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    public function hosts(): array
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
            // Allow ngrok URLs for local development
            // Update this when your ngrok URL changes
            'kenisha-unglib-eventually.ngrok-free.dev',
            // Wildcard for any ngrok-free.dev subdomain
            '(.+\.)?ngrok-free\.dev',
            '(.+\.)?ngrok\.io',
            '(.+\.)?ngrok\.app',
        ];
    }
}