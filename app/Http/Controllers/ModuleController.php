<?php
namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Models\User;
use App\Services\CommentRenderer;
use App\Services\Cropper;
use App\Services\DreamboardRenderer;
use App\Services\ModuleCompletion;
use App\Services\Video;
use Carbon\Carbon;
use DrewM\MailChimp\MailChimp;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
            // reset temporarily so we can go through module again if not sign up
            $moduleUser->pivot->complete = false;
            if($moduleUser->id == 1){
                $moduleUser->pivot->step = 1;
            } else {
                $moduleUser->pivot->step = 0;
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




    public function updateModule(Vimeo $vimeo, $module) {
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
        if($moduleUser->complete && $moduleUser->module_id == 1) {
            $step = intval('1');
        } else {
            $step = intval($this->request->get('step',$moduleUser->step));
        }
        switch($module->type) {
            case 'tag-cloud':
                if($step == $moduleUser->step) {
                    $moduleUser->step ++;
                }
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
                if($this->request->data['background']){
                    $moduleUser->addBackgroundImage($this->request->data['background']);
                }
                if(count(get_object_vars($moduleUser->data)) == 1) {
                    $moduleUser->step = 1;
                }

                if(count(get_object_vars($moduleUser->data)) >= 13 && $this->request->file('image') === null) {
                    $moduleUser->step = 2;
                }

                $moduleUser->save();

                if($this->request->file('image') && $this->request->input('name')) {
                    return ['imageUrl' => asset('uploads/dreamboard/'.$this->auth->user()->id.'/'.$fileName)];
                }

                break;
            case 'you-to-you':
                $completeUri = $this->request->get('data[complete_uri]', null, true);
                $letter = $this->request->get('data[letter]', null, true);
                if($completeUri !== null || $letter !== null) {
                    $output = [];
                    if($completeUri !== null) {
                        $response = $vimeo->request($completeUri, [], 'DELETE');
                        $location = $response['headers']['Location'];
                        $id = str_replace('/videos/', '', $location);

                        $response = $vimeo->request($location, [
                            'name' =>$this->auth->user()->first_name . ' ' . $this->auth->user()->last_name,
                            'privacy' => [
                                'view' => 'unlisted',
                                'download' => false,
                                'add' => false,
                                'comments' => 'nobody',
                                'embed' => 'public'
                            ],
                            'embed' => [
                                'buttons' => [
                                    'like' => false,
                                    'watchlater' => false,
                                    'share' => false,
                                    'embed' => false,
                                ],
                                'logos' => [
                                    'vimeo' => false
                                ]
                            ]
                        ], 'PATCH');
                        $output['video'] = $response['body'];
                    }
                    if($letter !== null) {
                        $output['letter'] = $letter;
                    }




                    $moduleUser->data = [$output];
                    if($step == $moduleUser->step) {
                        $moduleUser->step++;
                    }


                    break;
                }
            default:
                $moduleValidator = new ModuleCompletion($module);

                $requestData = $this->request->get('data');
                if(!$moduleValidator->isValid($step, $requestData)) {
                    abort(422);
                }

                $data = $moduleUser->data;
                if(empty($data)) {
                    $data = [];
                }

                if(is_object($data)) {
                    $data->$step = $requestData;
                } else {
                    $data[$step] = $requestData;
                }
                $moduleUser->data = $data;
                if($step == $moduleUser->step) {
                    $moduleUser->step ++;
                }

                break;
        }


        $moduleUser->save();

        return $moduleUser;

    }

    public function completeModule(Request $request, MailChimp $mailChimp,$module) {
        $moduleUser = $this->auth->user()->modules()->where('modules.id', $module->id)->first();
        if(!empty($moduleUser) && !$moduleUser->pivot->complete) {
            $moduleUser->pivot->complete = true;
            $moduleUser->pivot->completed_at = new Carbon();
            $moduleUser->pivot->save();
            $mailChimp->put('lists/'.config('belief.productListId', '').'/members/'.md5(Str::lower($request->user()->email)), [
                'status' => 'subscribed',
                'email_address' => $request->user()->email,
                'merge_fields' => [
                    'FNAME' => $request->user()->first_name,
                    'LNAME' => $request->user()->last_name,
                    'MODNUM' => $moduleUser->order,
                    'TYPE' => $request->user()->type
                ],
            ]);
        } else {
            // abort(404);
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

        return response($dreamboard->renderToImage()->getImageBlob(),200,['Content-type' => 'image/jpeg']);

    }


    public function getVimeoUploadDetails(Request $request) {
        $lib = new Vimeo(env('VIMEO_APP_ID'), env('VIMEO_SECRET'), env('VIMEO_ACCESS_TOKEN'));

        $response = $lib->request('/me/videos', ['type' => 'streaming'], 'POST');
        return $response['body'];
    }

    public function getVimeoThumbnail(Vimeo $vimeo, $userId, $id) {



        $moduleUser = User::findOrFail($userId)->modules()->where('modules.id', $id)->first();

        if($moduleUser->type === 'you-to-you' && $moduleUser->pivot->complete) {
            if(isset($moduleUser->pivot->data[0]->video)) {
                $video = $moduleUser->pivot->data[0]->video;
                $response = $vimeo->request($video->uri, [], 'GET');
                if($response['body']['status'] === 'available') {
                    if(isset($response['body']['pictures']) && isset($response['body']['pictures']['sizes'])) {
                        $thumbnails = $response['body']['pictures']['sizes'];
                        $lastThumbnail = $thumbnails[count($thumbnails) - 1]['link'];
                        return redirect($lastThumbnail);
                    }
                }
            }





        }
        return '';

    }
}
