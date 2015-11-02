<?php namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

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

    public function manifesto() {

        $modules = Module::with(['users' => function($query) {
            $query->where('user_id', $this->auth->user()->id);
        }])->orderBy('order', 'asc')->get();

        foreach($modules as $key => $module) {

            $modules[$key]->pivot = !empty($module->users) && !$module->users->isEmpty() ? $module->users[0]->pivot : false;
        }
        $view = view('app.dashboard.pdf.dashboard', [
            'modules' => $modules,
            'page' => 'dashboard'
        ])->render();

        $pdf = new Pdf($view );
        $pdf->setOptions([
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'margin-right' => 0,
            'javascript-delay' => 300]);
        $pdf->binary = env('WKHTMLTOPDF_LOCATION', '/usr/local/bin/wkhtmltopdf');
        $pdf->send(false, true);
        dd($pdf);

    }

}
