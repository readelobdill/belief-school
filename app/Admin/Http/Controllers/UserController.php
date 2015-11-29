<?php
namespace App\Admin\Http\Controllers;


use App\Models\Group;
use App\Models\User;
use Hash;
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
        return redirect(route('admin.users.list'))->with('message', 'User successfully created');
    }

    public function postUpdate($id) {

        $user = User::find($id);
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->paid = Input::get('paid', false) ? true : false;

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