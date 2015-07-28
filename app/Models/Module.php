<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    protected $fillable = ['name', 'order', 'module_id', 'slug', 'total_parts', 'free'];

    /**
     * @param $slug
     * @return Module
     */
    public static function findBySlug($slug) {
        return static::where('slug', $slug)->first();
    }

    public static function updateOrder($order) {
        foreach($order as $key => $id) {
            $module = static::find($id);
            if($module) {
                $module->order = $key;
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

    public function requiredModule() {
        return $this->belongsTo('App\Models\Module', 'module_id');
    }

    public function requiredBy() {
        return $this->hasMany('App\Models\Module');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User')->withTimestamps()->withPivot(['created_at', 'updated_at', 'data', 'complete', 'step', 'completed_at']);
    }


    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof User) {
            return new ModuleUserPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}