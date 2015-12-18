<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *in provider's boot method we bind the view to composer's composer method
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['Partials.donner-master', 'Partials.current-problems', 'Pages.individual-problems'], 'App\Http\ViewComposers\ProblemsComposer'
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