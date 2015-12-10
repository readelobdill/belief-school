<?php
namespace App\Services;

class CommentRenderer {


    protected $comments;

    protected $output = '';

    public function __construct($comments) {
        $this->comments = $comments;
    }

    public function render($comments) {
        if($comments->isEmpty()) {
            return;
        }
        $this->output .= '<ul class="comments-list">';
        foreach($comments as $key => $comment) {
            if(!$comment->deleted) {
                $this->output .= '<li class="comment '.($comment->sticky ? 'sticky' : '').'" data-id="'.$comment->id.'">';
                $this->output .= view('comments.comment', compact('comment'))->render();
                $this->render($comment->children);

                $this->output .= '</li>';
            }

        }
        $this->output .= '</ul>';
    }

    public function renderAll() {
        $this->render($this->comments);
        return $this->output;
    }


}