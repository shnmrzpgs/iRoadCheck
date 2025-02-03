<?php

namespace App\Providers;

use App\View\Components\app;
use App\View\Components\AppLayout;
use App\View\Components\GuestLayout;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        if (env('APP_ENV') !== 'local') {
//            URL::forceScheme('https');
//        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Blade::component('app-layout', app::class);
        Blade::component('app-layout', AppLayout::class);
        Blade::component('guest-layout', GuestLayout::class);
        Blade::component('components.search-bar', 'search-bar');
        $this->app->bind('path.public', function() {
            return base_path().'/../public';
        });
    }
}
