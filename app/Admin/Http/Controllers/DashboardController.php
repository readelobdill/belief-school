<?php
namespace App\Admin\Http\Controllers;


use App\Models\Option;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function getIndex()
    {
        $options = $this->options;


        return view('admin.dashboard.main', compact('options'));
    }


    public function postUpdateOptions(Request $request)
    {
        $tutored = isset($this->options['tutored_sessions_enabled']) ?
            $this->options['tutored_sessions_enabled'] :
            new Option(['key' => 'tutored_sessions_enabled']);

        $tutored->value = $request->has('tutored_sessions_enabled') ? '1' : '0';
        $tutored->save();

        return redirect(route('admin.home'));
    }

}