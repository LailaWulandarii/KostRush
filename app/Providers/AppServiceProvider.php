<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
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
    public function boot()
    {
        Validator::extend('password_matches_email', function ($attribute, $value, $parameters, $validator) {
            // Ambil email dari input pengguna
            $email = $validator->getData()['email'];

            // Lakukan pengecekan apakah kata sandi cocok dengan email
            return Auth::attempt(['email' => $email, 'password' => $value]);
        });

        Validator::replacer('password_matches_email', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', 'Password', $message);
        });
    }
}
