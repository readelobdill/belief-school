<?php

namespace App\Http\ViewComposers;

use App\Models\Module;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\View\View;


class MenuComposer {
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function compose(View $view) {
        if($this->auth->check()) {
            $modules = Module::with(['users' => function($query) {
                $query->where('user_id', $this->auth->user()->id);
            }])->orderBy('order', 'asc')->get();
        } else {
            $modules = Module::orderBy('order', 'asc')->get();
        }


        foreach($modules as $key => $module) {
            $modules[$key]->pivot = !empty($module->users) && !$module->users->isEmpty() ? $module->users[0]->pivot : false;
        }

        $view->with('modules', $modules);
    }
}