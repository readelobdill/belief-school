<?php

namespace App\Providers;

use App\Models\Module;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class MenuServiceProvider extends ServiceProvider {



    public function boot() {
        view()->composer(
            'app.ui.menu', 'App\Http\ViewComposers\MenuComposer'
        );
    }


    public function register() {

    }
}