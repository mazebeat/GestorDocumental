<?php namespace Illuminate\Foundation\Providers;

use Illuminate\Foundation\Console\KeyGenerateCommand;
use Illuminate\Support\ServiceProvider;

class KeyGeneratorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('command.key.generate');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('command.key.generate', function($app)
		{
			return new KeyGenerateCommand($app['files']);
		});

		$this->commands('command.key.generate');
	}

}
