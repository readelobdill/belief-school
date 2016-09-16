<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Vimeo\Vimeo;
use Infusionsoft_AppPool;
use Infusionsoft_App;
use Infusionsoft_Contact;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		$this->app->singleton(Vimeo::class, function() {
			return new Vimeo(env('VIMEO_APP_ID'), env('VIMEO_SECRET'), env('VIMEO_ACCESS_TOKEN'));
		});

		//This adds custom field to Contact prototype. Hopefully.
		Infusionsoft_Contact::addCustomField('_ModuleLastUpdated0');
		Infusionsoft_AppPool::addApp(new Infusionsoft_App(env('INFUSIONSOFT_HOST'), env('INFUSIONSOFT_KEY'), 443));
	}

}
