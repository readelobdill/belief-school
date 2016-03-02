<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    protected $fillable = ['name', 'order', 'module_id', 'slug', 'total_parts', 'free'];
    protected $casts = [
        'order' => 'integer',
        'total_parts' => 'integer',
    ];

    /**
     * @param $slug
     * @return Module
     */
    public static function findByType($type) {
        return static::where('type', $type)->first();
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

    public static function getLatestModuleForUser($user) {
        $modules = $user->modules()->get();
        $latestModule = $modules->last();
        if($latestModule->pivot->complete) {
            if($latestModule->pivot->created_at->diffInHours() < config('belief.lockout')) {
                return $latestModule;
            } else {
                $currentModule = static::where('order', $latestModule->order + 1)->first();
                if(!empty($currentModule)) {
                    return $currentModule;
                } else {
                    return null;
                }
            }
        }
        return $latestModule;

    }

    public function getAllComments() {
        $comments = $this->comments()->with('user', 'images')->get()->toHierarchy();
        $comments = $comments->sort(function($a, $b) {
            if($a->sticky == $b->sticky) {
                if($a->created_at->gt($b->created_at)) {
                    return -1;
                } else if($a->created_at->eq($b->created_at)) {
                    return 0;
                }
                return 1;
            } else if($a->sticky > $b->sticky) {
                return -1;
            } else if($a->sticky < $b->sticky) {
                return 1;
            }
        });


        return $comments;
    }

    public function isUnlocked(Module $previousModule) {
        if(!$this->free) {
            if(\Auth::check()) {
                if(!\Auth::user()->paid) {
                    return false;
                }
            } else {
                return false;
            }
        }


        if(!empty($previousModule->pivot)
            && $previousModule->pivot->complete
            && $previousModule->pivot->created_at->diffInHours() >= config('belief.lockout')) {
            return true;
        }
        if(!$previousModule->locks && !empty($previousModule->pivot) && $previousModule->pivot->complete) {
            return true;
        }
        if(!empty($this->pivot)) {
            return true;
        }

        return false;
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
        return $this->belongsToMany('App\Models\User')->withTimestamps()->withPivot(['created_at', 'updated_at', 'data', 'complete', 'step', 'completed_at', 'secret']);
    }

    public function requiredModules() {
        return $this->belongsToMany('App\Models\Module', 'requires_module', 'module_id', 'required_id');
    }
    public function requiredByModules() {
        return $this->belongsToMany('App\Models\Module', 'requires_module', 'required_id', 'module_id');
    }


    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof User) {
            return new ModuleUserPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}