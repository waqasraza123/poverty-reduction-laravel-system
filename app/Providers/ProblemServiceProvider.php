<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'Pages.individual-problems', 'App\Http\ViewComposers\ProblemsComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}