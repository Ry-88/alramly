<?php

namespace App\Providers;

use App\Models\MainMenu;
use App\Models\SocialMedia;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        View::share('meuns', MainMenu::where('status', 'enabled')->with(['subMeuns' => function ($q) {
            $q->where('status', 'enabled');
        }])->get());

        View::share('socialMedia', SocialMedia::first());
    }
}
