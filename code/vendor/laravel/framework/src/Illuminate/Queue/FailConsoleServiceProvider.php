<?php namespace Illuminate\Queue;

use Illuminate\Queue\Console\FailedTableCommand;
use Illuminate\Queue\Console\FlushFailedCommand;
use Illuminate\Queue\Console\ForgetFailedCommand;
use Illuminate\Queue\Console\ListFailedCommand;
use Illuminate\Queue\Console\RetryCommand;
use Illuminate\Support\ServiceProvider;

class FailConsoleServiceProvider extends ServiceProvider
{

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
		return array('command.queue.failed', 'command.queue.retry', 'command.queue.forget', 'command.queue.flush', 'command.queue.failed-table',);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('command.queue.failed', function () {
			return new ListFailedCommand;
		});

		$this->app->bindShared('command.queue.retry', function () {
			return new RetryCommand;
		});

		$this->app->bindShared('command.queue.forget', function () {
			return new ForgetFailedCommand;
		});

		$this->app->bindShared('command.queue.flush', function () {
			return new FlushFailedCommand;
		});

		$this->app->bindShared('command.queue.failed-table', function ($app) {
			return new FailedTableCommand($app['files']);
		});

		$this->commands('command.queue.failed', 'command.queue.retry', 'command.queue.forget', 'command.queue.flush', 'command.queue.failed-table');
	}

}
