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
//
        $this->validate($this->request, [
           'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'username' => 'required'
        ]);

        $input = $this->request->input();
        $input['password'] = \Hash::make($input['password']);


        $user = new User(
            $input
        );

        $group = Group::withName('User');
        $user->group()->associate($group);
        $user->save();



        $this->auth->login($user);
        $now = new Carbon();
        $module = Module::findByType('home');
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


    public function account() {
        $user = $this->auth->user();

        return view('app.auth.account', ['user' => $user, 'page' => 'account']);
    }

    public function submitAccount() {

        $this->validate($this->request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'min:8',
            'username' => 'required'
        ]);


        $user = $this->auth->user();

        $user->first_name = $this->request->input('first_name');
        $user->last_name = $this->request->input('last_name');
        if(!User::emailExists($this->request->input('email'))) {
            $user->email = $this->request->input('email');
        }
        $user->username = $this->request->input('username');

        if($this->request->input('password')) {
            $user->password = \Hash::make($this->request->input('password'));
        }
        $user->save();
    }


    public function checkEmail() {
        $email = $this->request->input('email');
        $emailExists = User::emailExists($email);
        if(!$emailExists) {
            return response('', 200);
        } else {
            abort(404);
        }
    }

}
