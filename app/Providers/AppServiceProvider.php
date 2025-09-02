<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //Not to be confused with preventsLazyLoading which returns a boolean, refer to web.php
        //and disable $jobs = Job::with(relations: 'employer')->get(); and return Job::all()
        //
        // This returns a ViolationException error which reads:
        //
        // Attempted to lazy load [employer] on model [App\Models\Job] but lazy loading is disabled.
        Model::preventLazyLoading();

        // Paginator::useBootstrapFive();
        //
        // If we are manually configuring the paginator element as we are using Tailwind, we have to go to
        // pagination/tailwind.blade.php

    }
}
