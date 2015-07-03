<?php
namespace App\Http\Controllers;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModuleController extends Controller {

    protected $request;
    protected $auth;

    public function __construct(Request $request, Guard $auth) {
        $this->request = $request;
        $this->auth = $auth;
    }


    public function viewModule($id) {

    }



    public function updateModule($id) {
        $module = Module::find($id);
        $now = new Carbon();
        $hasModule = $this->auth->user()->modules()->where('id', '=', $id)->first();

        if($module->step > 0) {
            $previousModule = $this->auth->user()
                                        ->modules()
                                        ->where('step', '=', $module->step - 1)
                                        ->first();
            if(empty($previousModule)) {
                \App::abort(404);
            } else if(!$previousModule->complete) {
                \App::abort(404);
            } else if($previousModule->complete && $previousModule->updated_at->diffInHours() < 48) {
                \App::abort(404);
            }

        }

        if(empty($hasModule)) {
            $this->auth->user()->modules()->attach($module, [
                'created_at' => $now,
                'updated_at' => $now,
                'data' => '',
                'complete' => false
            ]);
        }

        $moduleUser = $this->auth->user()->moduleUser()->where('module_id', $id)->first();
        switch($module->type) {
            case '3_fields':
                $data = $this->request->input('data');
                $moduleUser->data = json_encode($data);
                break;
        }


        $moduleUser->save();


        return $moduleUser;

    }

    public function sumbitTags($userId, $moduleId) {

        $user = User::find($userId);

        $module = Module::find($moduleId);
        if($module->type !== 'tagcloud') {
            \App::abort(404);
        }

        $moduleUser = $user->moduleUser()->where('module_id', '=', $moduleId)->first();


        $moduleUser->addTags([$this->request->input('tag_1'), $this->request->input('tag_2'), $this->request->input('tag_3')]);

        $moduleUser->save();

    }

    public function submitDreamboardImage($moduleId, $imageNumber) {
        $module = Module::find($moduleId);
        if($module->type !== 'dreamboard') {
            \App::abort(404);
        }


        $file = $this->request->file('image');
        $fileName = Str::random().'.'.$file->getExtension();
        $file->move(public_path('uploads/dreamboard'), $fileName);
        $module->addImage($fileName, $imageNumber);
    }
}
