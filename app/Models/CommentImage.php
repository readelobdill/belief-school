<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CommentImage extends Model {

    protected $fillable = ['filename'];

    public function comment() {
        return $this->belongsTo('App\Models\Comment');
    }


    public function getPath() {
        return asset('uploads/comment-images/'.$this->comment->user->id . '/'. $this->filename);
    }
}