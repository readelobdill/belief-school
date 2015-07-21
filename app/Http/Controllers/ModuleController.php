<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Services\CommentRenderer;
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


    public function viewModule($module) {

        if(empty($module)) {
            abort(404);
        }

        if(!$module->free && !$this->auth->user()->paid) {
            abort(404);
        }
        $moduleUser = $this->auth->user()->moduleUser()->where('module_id', $module->id)->first();
        $requiredModule = null;
        if(!empty($module->requiredModule)) {
            $requiredModule = $this->auth->user()->moduleUser()->where('module_id', $module->requiredModule->id)->first();

            if(empty($requiredModule)) {
                abort(404);
            }
        }

        if(!empty($moduleUser) && $moduleUser->complete) {
            abort(404);
        }



        if($module->order > 0) {
            $previousModule = $this->auth->user()

                ->modules()
                ->where('order', '=', $module->order - 1)
                ->first();

            if(empty($previousModule)) {
                abort(404);
            } else if(!$previousModule->pivot->complete) {
                abort(404);
            } else if($previousModule->pivot->complete && (new Carbon($previousModule->pivot->completed_at))->diffInHours() < 48 && $previousModule->locks) {
                abort(404);
            }
        }



        return view('app.modules.'.$module->slug.'.index', ['page' => $module->slug, 'module' => $module]);
    }



    public function updateModule($module) {
        $now = new Carbon();
        $hasModule = $this->auth->user()->modules()->where('modules.id', '=', $module->id)->first();

        if(!$module->free && !$this->auth->user()->paid) {
            abort(404);
        }
        if($module->order > 0) {
            $previousModule = $this->auth->user()
                                        ->modules()
                                        ->where('order', '=', $module->order - 1)
                                        ->first();
            if(empty($previousModule)) {
                abort(404);
            } else if(!$previousModule->pivot->complete) {
                abort(404);
            } else if($previousModule->pivot->complete && (new Carbon($previousModule->pivot->completed_at))->diffInHours() < 48 && $previousModule->locks) {
                abort(404);
            }

        }

        if(empty($hasModule)) {
            $this->auth->user()->modules()->attach($module, [
                'created_at' => $now,
                'updated_at' => $now,
                'data' => '',
                'complete' => false,
                'step' => 0
            ]);
        }

        $moduleUser = $this->auth->user()->moduleUser()->where('module_id', $module->id)->first();

        if($moduleUser->step > $module->total_parts) {
            abort(404);
        }
        if($moduleUser->complete) {
            abort(404);
        }

        switch($module->type) {
            case 'tag-cloud':

                break;
            case 'dreamboard':
                $file = $this->request->file('image');
                $fileName = Str::random().'.'.$file->getExtension();
                $file->move(public_path('uploads/dreamboard'), $fileName);
                $moduleUser->addImage($fileName, $this->request->input('position'));
                break;
            default:
                $data = json_decode($moduleUser->data);
                if(empty($data)) {
                    $data = [];
                }
                $data[$moduleUser->step] = $this->request->input();
                $moduleUser->data = json_encode($data);
                $moduleUser->step++;

                break;
        }


        $moduleUser->save();


        return $moduleUser;

    }

    public function completeModule($module) {
        $moduleUser = $this->auth->user()->moduleUser()->where('module_id', $module->id)->first();
        if(!empty($moduleUser)) {
            $moduleUser->complete = true;
            $moduleUser->completed_at = new Carbon();
            $moduleUser->save();
        } else {
            abort(404);
        }
    }

    public function viewForum($module) {

        $comments = $module->getAllComments();

        $commentRenderer = new CommentRenderer($comments);
        $page = 'forum';

        return view('app.forum.forum', compact('commentRenderer', 'module', 'page'));

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
