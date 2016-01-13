<?php

namespace App\Http\ViewComposers;

use App\Models\Module;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\View\View;


class LayoutComposer {
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function compose(View $view) {

        $mobileDetect = new \Mobile_Detect();


        $view->with('userAgent', parse_user_agent())->with('mobileDetect', $mobileDetect);
    }
}