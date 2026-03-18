<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Services\SpamDetectionService;
use App\Services\SupabaseAuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SupabaseAuthService::class, function ($app) {
            return new SupabaseAuthService();
        });

        $this->app->singleton(SpamDetectionService::class, function ($app) {
            return new SpamDetectionService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS when behind ngrok or any proxy
        if (str_contains(config('app.url'), 'ngrok')) {
            \URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', true);
        }
       View::share('recaptchaSiteKey', config('services.recaptcha.site_key'));
    }
}
