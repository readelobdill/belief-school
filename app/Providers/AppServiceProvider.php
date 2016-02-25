<?php namespace App\Providers;

use DrewM\MailChimp\MailChimp;
use Illuminate\Support\ServiceProvider;
use Vimeo\Vimeo;

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

		$this->app->singleton(MailChimp::class, function() {
			return new MailChimp(config('mail.mailchimp.apiKey'));
		});
		$this->app->singleton(Vimeo::class, function() {
			return new Vimeo(env('VIMEO_APP_ID'), env('VIMEO_SECRET'), env('VIMEO_ACCESS_TOKEN'));
		});
	}

}
