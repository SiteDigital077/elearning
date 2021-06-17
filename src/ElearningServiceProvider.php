<?php

namespace DigitalsiteSaaS\Elearning;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class ElearningServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('elearning', function($app) {
			return new Elearning;

		});
	}

	public function boot()
	{
		
		require __DIR__ . '/Http/routes.php';

		$this->loadViewsFrom(__DIR__ . '/../views', 'elearning');

	}

}

