<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Redirect unauthenticated users to the login page
        view()->composer('*', function ($view) {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
        });
    }
}
