<?php
namespace App\Admin\Http\Controllers;


use App\Models\Group;
use App\Models\User;
use Hash;
use Input;

class UserController extends Controller {

    public function getList() {
        $users = User::with(['group'])->get();
        return view('admin.users.list', compact('users'));
    }


    public function getCreate() {
        $groups = Group::all();
        return view('admin.users.create', compact('groups'));
    }

    public function postCreate() {
        $user = new User([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password'))
        ]);
        $group = Group::find(Input::get('group_id'));
        $user->group()->associate($group);
        $user->save();

        return redirect(route('admin.users.list'))->with('message', 'User successfully created');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
    }

}