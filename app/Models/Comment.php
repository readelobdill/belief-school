<?php
namespace App\Models;

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
}