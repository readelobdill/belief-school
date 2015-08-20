<?php
namespace App\Models;

use Misd\Linkify\Linkify;

class Comment extends \Lanz\Commentable\Comment {

    //protected $orderColumn = 'created_at';

    /**
     * Comment belongs to a user.
     *
     * @return User
     */




    public function user()
    {
        return $this->belongsTo(\Config::get('auth.model'));
    }



    public function getBodyAttribute($value) {
        $linkify = new Linkify();
        return $linkify->process(e($value));
    }
}