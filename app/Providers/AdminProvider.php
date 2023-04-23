<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Admin;


class AdminProvider extends ServiceProvider
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
    public function boot(){
    Auth::provider('admin', function ($app, array $config) {
        return new AdminUserProvider();
    });

    Auth::extend('admin', function ($app, $name, array $config) {
        return new Guard(Auth::createUserProvider($config['provider']), $app['session.store']);
    });
    }

    public function retrieveById($identifier)
    {
        return Admin::find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        // implement this if you need "remember me" functionality
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // implement this if you need "remember me" functionality
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
            (count($credentials) === 1 &&
            array_key_exists('password', $credentials))) {
            return null;
        }

        return Admin::where('email', $credentials['email'])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return Hash::check($credentials['password'], $user->getAuthPassword());
    }
}
