<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModuleUserPivot extends Pivot {
    protected $table = 'module_user';
    protected $dates = ['created_at', 'updated_at', 'completed_at'];
    public function __construct(Model $parent, $attributes, $table, $exists = false) {
        parent::__construct($parent, $attributes, $table, $exists);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function module() {
        return $this->belongsTo('App\Models\Module');
    }



    public function addTags(array $tags) {
        $data = $this->data;
        if(empty($data)) {
            $this->data = [];
        }
        $data = array_merge($data, $tags);
        $this->data = $data;
    }



    public function addImage($image, $imageName) {
        $data = $this->data;
        if(empty($data)) {
            $data = new \stdClass();
        }
        if(isset($data->{$imageName})) {
            unlink(public_path('uploads/dreamboard/'.\Auth::user()->id.'/'.$data->{$imageName}));
        }
        $data->{$imageName} = $image;
        $this->data = $data;
    }

    public function getDataAttribute($value) {
        return json_decode($value);
    }

    public function setDataAttribute($value) {
        if(!is_string($value)) {
            $this->attributes['data'] = json_encode($value);
        } else {
            $this->attributes['data'] = $value;
        }

    }
}