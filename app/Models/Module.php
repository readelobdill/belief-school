<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    protected $fillable = ['name', 'step', 'type'];



    public static function updateOrder($order) {
        foreach($order as $key => $id) {
            $module = static::find($id);
            if($module) {
                $module->step = $key;
                $module->save();
            }

        }
    }

    public function getAllComments() {
        $comments = $this->comments()->with('user')->get()->toHierarchy();
        $comments->sort(function($a, $b) {
            if($a->sticky == $b->sticky) {
                if($a->created_at < $b->created_at) {
                    return 1;
                } else if($a->created_at == $b->created_at) {
                    return 0;
                }
                return -1;
            } else if($a->sticky < $b->sticky) {
                return 1;
            } else if($a->sticky > $b->sticky) {
                return -1;
            }
        });
        return $comments;
    }



    /**
     * This model has many comments.
     *
     * @return Comment
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}