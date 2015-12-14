<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 * in provider's boot method we bind the view to composer's composer method
	 * @return void
	 */
	public function boot()
	{
        //bind data to views
		view()->composer(
            ['Pages.needy', 'Pages.donner', 'Partials.header', 'Pages.test'],
            'App\Http\ViewComposers\DashboardComposer');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
