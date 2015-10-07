<?php
namespace App\Admin\Http\Controllers;


use App\Models\Module;
use App\Services\CommentRenderer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller {
    protected $request;
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getCreate() {
        $modules = Module::all();
        return view('admin.comments.create', compact('modules'));
    }

    public function postCreate() {
        $module = Module::find($this->request->input('module_id'));
        $comment = new Comment([
            'title' => $this->request->input('title'),
            'body' => $this->request->input('body')
        ]);
        $comment->user()->associate(Auth::user());
        $module->comments()->save($comment);


        return redirect(route('admin.modules.comments', [$module->id]));


    }


    public function listForModule($id) {
        $module = Module::find($id);
        $comments = $module->getAllComments();

        $commentRenderer = new CommentRenderer($comments);
        $commentList = $commentRenderer->renderAll();
        return view('admin.comments.list', compact('module', 'comments', 'commentList'));

    }


    public function toggleSticky($comment) {
        if(!empty($comment)) {
            $comment->sticky = !$comment->sticky;
            $comment->save();
        }
        return $comment;
    }

    public function replyTo($id) {
        $comment = Comment::find($id);

        $nComment = new Comment([
            'title' => $this->request->input('title'),
            'body' => $this->request->input('body')
        ]);
        $nComment->user()->associate(Auth::user());
        $comment->commentable->comments()->save($nComment);
        $nComment->makeChildOf($comment);

        return redirect(route('admin.modules.comments', [$comment->commentable->id]));

    }

    public function deleteComment($comment) {

        $comment->deleted = !$comment->deleted;
        $comment->save();
    }

    public function getReplyTo($id) {
        $comment = Comment::find($id);

        return view('admin.comments.reply', compact('comment'));
    }

}