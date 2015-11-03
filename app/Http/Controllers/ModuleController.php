<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Services\CommentRenderer;
use App\Services\Cropper;
use App\Services\DreamboardRenderer;
use App\Services\ModuleCompletion;
use Carbon\Carbon;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use stojg\crop\CropBalanced;
use stojg\crop\CropEntropy;
use Symfony\Component\HttpFoundation\File\File;
use Vimeo\Vimeo;

class ModuleController extends Controller {

    protected $request;
    protected $auth;

    public function __construct(Request $request, Guard $auth) {
        $this->request = $request;
        $this->auth = $auth;
    }


    public function viewModule($module = 'home') {
        if(empty($module)) {
            abort(404);
        }
        if($module === 'home') {
            $module = Module::with(['requiredModule', 'requiredModules'])->where('template', $module)->first();
        }

        if(!$module->free && $this->auth->check() && !$this->auth->user()->paid) {
            abort(404);
        }

        if($module->template === 'home' && !$this->auth->check()) {
            $moduleUser = false;
        } else if($this->auth->check()) {
            $moduleUser = $this->auth
                ->user()
                ->modules()
                ->where('modules.id', $module->id)->first();
        } else {
            return redirect()->guest(route('auth.login'));
        }


        $requiredModules = [];
        if(!$module->requiredModules->isEmpty()) {
            foreach($module->requiredModules as $mod) {
                $requiredMod = $this->auth->user()->modules()->where('modules.id', $mod->id)->first();

                if(empty($requiredMod)) {
                    abort(404);
                }
                $requiredModules[$mod->template] = $requiredMod->pivot;
            }
        }







        if(!empty($moduleUser) && $moduleUser->pivot->complete && !\Session::get('paid', false)) {
            $latestModule = Module::getLatestModuleForUser($this->auth->user());
            if(empty($latestModule)) {
                return redirect(route('dashboard'));
            }
            if($latestModule->id != $module->id) {
                return redirect(route('modules.view', [$latestModule->slug]));
            }
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
            } else if($previousModule->pivot->complete && (new Carbon($previousModule->pivot->created_at))->diffInHours() < config('belief.lockout') && $previousModule->locks) {
                abort(404);
            }
        }

        if(empty($moduleUser) && $this->auth->check()) {
            $now = new Carbon();
            $this->auth->user()->modules()->attach($module, [
                'created_at' => $now,
                'updated_at' => $now,
                'data' => '',
                'complete' => false,
                'step' => 0,
                'secret' => Str::random(26)
            ]);
            $moduleUser = $this->auth->user()->modules()->where('modules.id', $module->id)->first();
        }

        $nextModule = Module::where('order', $module->order + 1)->first();



        $mobileDetect = new \Mobile_Detect();

        $headers=['Cache-Control'=>'no-cache, no-store, max-age=0, must-revalidate','Pragma'=>'no-cache','Expires'=>'Fri, 01 Jan 1990 00:00:00 GMT'];
        return response(view('app.modules.'.$module->template.'.index', [
            'page' => $module->template,
            'module' => $module,
            'moduleUser' => (!empty($moduleUser) ? $moduleUser->pivot : false),
            'requiredModules' => $requiredModules,
            'isMobile' => $mobileDetect->isTablet() || $mobileDetect->isMobile(),
            'nextModule' => $nextModule
            ]), 200, $headers);
    }




    public function updateModule($module) {
        abort(500);
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
            } else if($previousModule->pivot->complete && (new Carbon($previousModule->pivot->created_at))->diffInHours() < config('belief.lockout') && $previousModule->locks) {
                abort(404);
            }

        }




        if(empty($hasModule)) {
            $this->auth->user()->modules()->attach($module, [
                'created_at' => $now,
                'updated_at' => $now,
                'data' => '',
                'complete' => false,
                'step' => 0,
                'secret' => Str::random(26)
            ]);
        }

        $moduleUser = $this->auth->user()->modules()->where('modules.id', $module->id)->first()->pivot;

        if($moduleUser->step >= $module->total_parts) {
            abort(404);
        }
        if($moduleUser->complete) {
            abort(404);
        }



        switch($module->type) {
            case 'tag-cloud':
                $moduleUser->step++;
                break;
            case 'dreamboard':
                if($this->request->file('image') && $this->request->input('name')) {
                    $file = $this->request->file('image');
                    $fileName = Str::random(32).'.'.$file->guessExtension();
                    $file->move(public_path('uploads/dreamboard/'.$this->auth->user()->id), $fileName);
                    $cropper = new Cropper(public_path('uploads/dreamboard/'.$this->auth->user()->id.'/'.$fileName));
                    $croppedImage = $cropper->crop($this->request->input('x'), $this->request->input('y'), $this->request->input('width'), $this->request->input('height'));
                    $croppedImage->writeImage(public_path('uploads/dreamboard/'.$this->auth->user()->id.'/'.$fileName));
                    $moduleUser->addImage($fileName, $this->request->input('name'));
                }
                if(count(get_object_vars($moduleUser->data)) == 1) {
                    $moduleUser->step = 1;
                }

                if(count(get_object_vars($moduleUser->data)) == 13 && $this->request->file('image') === null) {
                    $moduleUser->step = 2;
                }

                $moduleUser->save();

                if($this->request->file('image') && $this->request->input('name')) {
                    return ['imageUrl' => asset('uploads/dreamboard/'.$this->auth->user()->id.'/'.$fileName)];
                }

                break;
            case 'you-to-you':
                if($this->request->file('video') !== null) {
                    $file = $this->request->file('video');
                    $random = Str::random(32);
                    $fileName = $random.'.'.$file->guessExtension();
                    $file->move(public_path('uploads/you-to-you/'.$this->auth->user()->id), $fileName);
                    //Recreating the file, as when move is called it doesn't update the location
                    //$file = new File(public_path('uploads/you-to-you/'.$this->auth->user()->id).'/'. $fileName);
                    $ffmpeg = FFMpeg::create([
                        'ffmpeg.binaries'  => env('FFMPEG_LOCATION'),
                        'ffprobe.binaries' => env('FFPROBE_LOCATION'),
                    ]);
                    $video = $ffmpeg->open(public_path('uploads/you-to-you/'.$this->auth->user()->id).'/'. $fileName);
                    $frame = $video->frame(TimeCode::fromSeconds(0));
                    $frame->save(public_path('uploads/you-to-you/'.$this->auth->user()->id).'/'.$random.'.jpg');
                    $moduleUser->data = [['localVideo' => $fileName, 'image' => $random.'.jpg']];
                    $moduleUser->step++;


                    break;
                }
            default:
                $moduleValidator = new ModuleCompletion($module);
                if(!$moduleValidator->isValid($moduleUser->step, $this->request->input())) {
                    abort(422);
                }

                $data = $moduleUser->data;
                if(empty($data)) {
                    $data = [];
                }
                $data[$moduleUser->step] = $this->request->input();
                $moduleUser->data = $data;
                $moduleUser->step++;

                break;
        }


        $moduleUser->save();

        return $moduleUser;

    }

    public function completeModule($module) {
        $moduleUser = $this->auth->user()->modules()->where('modules.id', $module->id)->first();
        if(!empty($moduleUser) && !$moduleUser->pivot->complete) {
            $moduleUser->pivot->complete = true;
            $moduleUser->pivot->completed_at = new Carbon();
            $moduleUser->pivot->save();
        } else {
            abort(404);
        }
    }


    public function tagCloud($secret) {
        $moduleUser = ModuleUser::with(['user', 'module'])->where('secret', $secret)->first();

        if(empty($moduleUser)) {
            abort(404);
        }

        if($moduleUser->module->type !== 'tag-cloud') {
            abort(404);
        }

        return view('app.public-modules/tag-collection', ['moduleUser' => $moduleUser, 'page' => 'tag-cloud-form']);
    }

    public function tagCloudSubmit($secret) {
        $moduleUser = ModuleUser::with(['user', 'module'])->where('secret', $secret)->first();

        if(empty($moduleUser)) {
            abort(404);
        }

        if($moduleUser->module->type !== 'tag-cloud') {
            abort(404);
        }


        $moduleUser->addTags($this->request->input('tags'));
        $moduleUser->save();

        $homeModule = $moduleUser->user->modules()->where('order', 0)->first();
        $gender = $homeModule->pivot->data->{'1'}->gender;

        return view('app.public-modules.tag-collection-success', ['page' => 'tag-collection-success', 'moduleUser'=>$moduleUser, 'gender' => $gender]);
    }


    public function share($secret) {
        $moduleUser = ModuleUser::with(['user', 'module'])->where('secret', $secret)->first();

        if(empty($moduleUser)) {
            abort(404);
        }
        $module = $moduleUser->module;
        $module->pivot = $moduleUser;


        return view('app.share-modules.'.$moduleUser->module->template, ['module' => $module, 'page' => 'share-'.$moduleUser->module->template]);
    }

    public function viewForum($module) {

        $comments = $module->getAllComments();

        $commentRenderer = new CommentRenderer($comments);
        $page = 'forum';

        return view('app.forum.forum', compact('commentRenderer', 'module', 'page', 'comments'));

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


    public function showDreamboardImage() {
        $module = $this->auth->user()->modules()->where('template', 'visualise')->first();
        $dreamboard = new DreamboardRenderer($module->pivot->data, $this->auth->user());

        return response($dreamboard->renderToImage()->getImageBlob(),200,['Content-type' => 'image/jpeg']);
    }

    public function showDreamboardForSecret($secret) {
        $moduleUser = ModuleUser::with(['user', 'module'])->where('secret', $secret)->first();
        if($moduleUser->module->type !== 'dreamboard') {
            abort(404);
        }
        $dreamboard = new DreamboardRenderer($moduleUser->data, $moduleUser->user);

        return response($dreamboard->renderToImage($this->request->input('fb', false))->getImageBlob(),200,['Content-type' => 'image/jpeg']);

    }
}
