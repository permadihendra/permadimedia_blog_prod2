<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('blog_configs')) {

            $configData = BlogConfig::get();
            $configs = [];
            foreach ($configData as $config) {
                $configs[$config->name] = $config->value;
            }

            View::share('configs', $configs);
        }
    }
}
