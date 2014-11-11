<?php

namespace Ferdirn\Provinces;

use Illuminate\Support\ServiceProvider;

/**
 * ProvinceListServiceProvider
 *
 */

class ProvincesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

        /**
        * Bootstrap the application.
        *
        * @return void
        */
        public function boot()
        {
            $this->package('ferdirn/laravel-id-provinces');
        }

	/**
	 * Register everything.
	 *
	 * @return void
	 */
	public function register()
	{
	    $this->registerProvinces();
	    $this->registerCommands();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function registerProvinces()
	{
	    $this->app->bind('provinces', function($app)
	    {
	        return new Provinces();
	    });
	}

	/**
	 * Register the artisan commands.
	 *
	 * @return void
	 */
	protected function registerCommands()
	{
	    $this->app['command.provinces.migration'] = $this->app->share(function($app)
	    {
	        return new MigrationCommand($app);
	    });

	    $this->commands('command.provinces.migration');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('provinces');
	}
}