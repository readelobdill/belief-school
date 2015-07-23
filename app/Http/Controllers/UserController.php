<?php namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    private $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function createUser() {
        try {
            $user = new User(
                $this->request->input()
            );

            $group = Group::withName('User');
            $user->group()->associate($group);
            $user->save();
        } catch(Exception $e) {
            print_r($e);
        }
        return $user;
    }

}
