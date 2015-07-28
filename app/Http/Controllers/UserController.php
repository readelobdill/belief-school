<?php namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Module;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller {

    protected $request;
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, Guard $auth)
    {
        $this->request = $request;
        $this->auth = $auth;
    }


    public function createUser() {

        $user = new User(
            $this->request->input()
        );

        $group = Group::withName('User');
        $user->group()->associate($group);
        $user->save();



        $this->auth->login($user);
        $now = new Carbon();
        $module = Module::findBySlug('home');
        $user->modules()->attach($module, [
            'created_at' => $now,
            'updated_at' => $now,
            'data' => '',
            'complete' => false,
            'step' => 1,
            'secret' => Str::random(26)
        ]);



        return $user;
    }

}
