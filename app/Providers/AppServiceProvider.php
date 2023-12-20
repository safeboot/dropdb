<?php

namespace App\Providers;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {

        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {

        Request::setTrustedProxies(['REMOTE_ADDR'],  Request::HEADER_X_FORWARDED_FOR);

    }
}
