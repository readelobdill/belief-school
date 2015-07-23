<?php namespace App\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    protected $request;
    protected $auth;

    public function __construct(Request $request, Guard $auth) {
        $this->auth = $auth;
        $this->request = $request;
    }

    public function index() {
        return view('app.dashboard.dashboard', [
            'modules' => $this->auth->user()->modules,
            'page' => 'dashboard'
        ]);
    }

}
