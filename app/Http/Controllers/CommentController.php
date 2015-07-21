<?php namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class CommentController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

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

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function reply($comment)
    {
        $nComment = new Comment([
            'title' => $this->request->input('title', ''),
            'body' => $this->request->input('body', '')
        ]);
        $nComment->user()->associate($this->auth->user());
        $comment->commentable->comments()->save($nComment);
        $nComment->makeChildOf($comment);

        return view('comments.comment', ['comment' => $nComment]);
    }

    public function create($module) {
        $comment = new Comment([
            'title' => $this->request->input('title', ''),
            'body' => $this->request->input('body')
        ]);
        $comment->user()->associate($this->auth->user());
        $module->comments()->save($comment);

        return view('comments.comment', ['comment' => $comment]);
    }

}
