<?php
namespace App\Admin\Http\Controllers;


use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller {
    protected $request;
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getCreate() {

        return view('admin.modules.create');
    }

    public function postCreate() {
        $moduleCount = Module::count();
        $module = new Module([
            'name' => $this->request->input('name'),
            'slug' => $this->request->input('type'),
            'order' => $moduleCount
        ]);
        $module->save();

        if($this->request->ajax()) {
            return ['success' => true, 'redirect' => route('admin.modules.list'), 'module' => $module];
        } else {
            return redirect(route('admin.modules.list'))->with('message', 'Successfully created module');
        }
    }

    public function deleteModule( $id) {
        $module = Module::find($id);

        $module->delete();

        if($this->request->ajax()) {
            return ['success' => true, 'redirect' => route('admin.modules.list')];
        } else {
            return redirect(route('admin.modules.list'))->with('message', 'Successfully deleted module');
        }


    }

    public function getList() {
        $modules = Module::orderBy('order')->get();

        return view('admin.modules.list', compact('modules'));
    }

    public function updateOrder() {
        $order = $this->request->input('order');
        Module::updateOrder($order);
        return $order;
    }


    public function getEdit($id) {
        $module = Module::find($id);
        return view('admin.modules.edit', compact('module'));
    }

    public function postEdit($id) {
        $module = Module::findOrFail($id);
        $module->name = $this->request->input('name');
        $module->type = $this->request->input('type');
        $module->save();

        if($this->request->ajax()) {
            return ['success' => true, 'redirect' => route('admin.modules.list'), 'module' => $module];
        } else {
            return redirect(route('admin.modules.list'))->with('message', 'Successfully created updated');
        }
    }


}