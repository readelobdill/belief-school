<?php
namespace App\Admin\Http\Controllers;


use App\Models\Group;
use App\Models\Module;
use App\Models\ModuleUser;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Str;
use Input;

class UserController extends Controller {

    public function getList() {
        $users = User::with(['group', 'modules'])->get();
        return view('admin.users.list', compact('users'));
    }


    public function getCreate() {
        $groups = Group::all();
        return view('admin.users.create', compact('groups'));
    }

    public function postCreate() {

        $user = new User([
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'email' => Input::get('email'),
            'paid' => Input::get('paid') ? true : false,
            'password' => \Hash::make(Input::get('password'))
        ]);
        $group = Group::find(Input::get('group_id'));
        $user->group()->associate($group);
        $user->save();
        if($user->paid) {
            $module = Module::findByType('home');
            $now = new Carbon();
            $user->modules()->attach($module, [
                'created_at' => $now,
                'updated_at' => $now,
                'data' => '',
                'complete' => false,
                'step' => 1,
                'secret' => Str::random(26)
            ]);
        }


        return redirect(route('admin.users.list'))->with('message', 'User successfully created');
    }

    public function postUpdate($id) {

        $user = User::find($id);
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');

        $paid = Input::get('paid', false) ? true : false;
        if($paid && !$user->paid) {
            $moduleUser = $user->modules()->orderBy('order', 'ASC')->first();
            if(!empty($moduleUser) && !$moduleUser->pivot->complete) {
                $moduleUser->pivot->complete = true;
                $moduleUser->pivot->completed_at = new Carbon();
                $moduleUser->pivot->save();
            }
        }

        $user->paid = $paid;


        if(Input::get('password')) {
            $user->password = \Hash::make(Input::get('password'));
        }
        $group = Group::find(Input::get('group_id'));
        $user->group()->associate($group);
        $user->save();
        return redirect(route('admin.users.list'))->with('message', 'User successfully updated');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
    }

    public function getEdit($id) {
        $user = User::find($id);
        $groups = Group::all();

        return view('admin.users.edit', compact('user', 'groups'));

    }

}