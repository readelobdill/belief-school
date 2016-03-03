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
        $force = $this->request->has('force');
        $fileName = $this->auth->user()->id.'.pdf';
        if(file_exists(storage_path('manifestos/'.$fileName)) && !$force) {
            return response(file_get_contents(storage_path('manifestos/'.$fileName)), 200, ['content-type' => 'application/pdf', 'content-disposition' => 'attachment; filename="manifesto.pdf"']);
        } else {
            \File::makeDirectory(storage_path('manifestos'), 493, true, true);
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
                'load-error-handling' => 'ignore',
                'load-media-error-handling' => 'ignore',
                'javascript-delay' => 1000]);
            $pdf->binary = env('WKHTMLTOPDF_LOCATION', 'wkhtmltopdf');

            $pdf->saveAs(storage_path('manifestos/'.$fileName));
            return redirect(route('dashboard.manifesto'));
        }


    }

}
