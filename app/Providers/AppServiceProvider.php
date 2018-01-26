<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * ClearDB uses MySQL version 5.5, while our dev database is MySQL 5.7.
         * The default string length in MySQL 5.5 is too short for 
         * Passport authorization keys, so we need to manually set the 
         * default string length in the app service provider 
         * before we run the database migrations in our production app
         */
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
