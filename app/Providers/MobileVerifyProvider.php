<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mobile_Detect;

class MobileVerifyProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $detect = new Mobile_Detect;
        if ($detect->isMobile() || $detect->isTablet()) {
            return abort(503);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
