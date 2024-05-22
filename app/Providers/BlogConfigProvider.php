<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\BlogConfig;

class BlogConfigProvider extends ServiceProvider
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
        //
        View::composer('components.layouts.template', function ($view) {
            $configNames = ['logo', 'app_name'];

            $configs = BlogConfig::whereIn('name', $configNames)->pluck('name', 'value');

            $view->with(['configs' => $configs],);
        });
    }
}
