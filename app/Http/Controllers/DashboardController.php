<?php namespace App\Http\Controllers;

use App\Models\Module;
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

        $modules = Module::with(['users' => function($query) {
            $query->where('user_id', $this->auth->user()->id);
        }])->orderBy('order', 'asc')->get();

        foreach($modules as $key => $module) {

            $modules[$key]->pivot = !empty($module->users) && !$module->users->isEmpty() ? $module->users[0]->pivot : false;
        }
        return view('app.dashboard.dashboard', [
            'modules' => $modules,
            'page' => 'dashboard'
        ]);
    }
}
