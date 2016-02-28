<?php

namespace App\Providers;

use App\Models\Module;
use App\Models\Option;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewComposerProvider extends ServiceProvider {



    public function boot() {
        view()->composer(
            'app.layout', 'App\Http\ViewComposers\LayoutComposer'
        );

        view()->composer(['app.modules.home.details', 'app.pages.about'], function($view) {
            $view->with('options', Option::getAll());
        });
    }


    public function register() {

    }
}