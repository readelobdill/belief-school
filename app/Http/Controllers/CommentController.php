<?php namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentImage;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $this->validate($this->request, [
            'image' => 'mimes:jpeg,png,gif|max:3072',
        ]);
        $nComment = new Comment([
            'title' => $this->request->input('title', ''),
            'body' => $this->request->input('body', '')
        ]);
        $nComment->user()->associate($this->auth->user());
        $comment->commentable->comments()->save($nComment);
        $nComment->makeChildOf($comment);

        $this->attachImage($this->request->file('image'), $nComment);

        return view('comments.comment', ['comment' => $nComment]);
    }

    public function create($module) {
        $this->validate($this->request, [
            'image' => 'mimes:jpeg,png,gif|max:3072',
        ]);
        $comment = new Comment([
            'title' => $this->request->input('title', ''),
            'body' => $this->request->input('body')
        ]);

        $comment->user()->associate($this->auth->user());
        $module->comments()->save($comment);

        $this->attachImage($this->request->file('image'), $comment);


        return view('comments.comment', ['comment' => $comment]);
    }

    private function attachImage($image, $comment) {
        if($image) {

            $fileName = Str::random(32).'.'.$image->guessExtension();
            $image->move(public_path('uploads/comment-images/'.$this->auth->user()->id), $fileName);
            $commentImage = new CommentImage(['filename' => $fileName]);
            $comment->images()->save($commentImage);


        }
    }
    public function delete($comment) {
        if($comment->user->id !== $this->auth->user()->id) {
            abort(403);
        }
        $comment->deleted = !$comment->deleted;
        $comment->save();
        return view('comments.comment', ['comment' => $comment]);
    }


    public function getImage($comment, $imageName) {
        $image = $comment->images()->where('filename', $imageName)->first();
        if(empty($image)) {
           abort(404);
        }

        return view('app.forum.image', compact('image', 'comment'));

    }


}
