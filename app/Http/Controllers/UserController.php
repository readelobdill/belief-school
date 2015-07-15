<?php namespace App\Http\Controllers;

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
        return $this->request->input();
    }

}
