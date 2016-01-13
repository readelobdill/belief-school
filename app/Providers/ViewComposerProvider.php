<?php

namespace App\Providers;

use App\Models\Module;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewComposerProvider extends ServiceProvider {



    public function boot() {
        view()->composer(
            'app.layout', 'App\Http\ViewComposers\LayoutComposer'
        );
    }


    public function register() {

    }
}