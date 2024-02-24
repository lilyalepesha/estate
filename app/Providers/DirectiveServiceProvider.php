<?php

namespace App\Providers;

use App\Models\Architect;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('canEditArchitect', function (Architect $architect) {
            return auth()->guard('architects')->check()
                && auth()->guard('architects')->user()->id === $architect->id;
        });
    }
}
