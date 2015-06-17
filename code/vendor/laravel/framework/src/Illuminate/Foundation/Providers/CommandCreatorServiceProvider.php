<?php namespace Illuminate\Foundation\Providers;

use Illuminate\Foundation\Console\CommandMakeCommand;
use Illuminate\Support\ServiceProvider;

class CommandCreatorServiceProvider extends ServiceProvider {

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
		return array(
			'command.command.make',
		);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('command.command.make', function($app)
		{
			return new CommandMakeCommand($app['files']);
		});

		$this->commands('command.command.make');
	}

}
