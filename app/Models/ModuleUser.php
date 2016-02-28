<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModuleUser extends Model {
    protected $table = 'module_user';
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [
        'step' => 'integer',
    ];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function module() {
        return $this->belongsTo('App\Models\Module');
    }



    public function addTags(array $tags) {
        $data = $this->data;
        if(empty($data)) {
            $data = [];
        }
        $data = array_merge($data, $tags);
        $this->data = $data;
    }



    public function addImage($image, $imageName) {
        $data = $this->data;
        if(empty($data)) {
            $data = new \stdClass();
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

    public function getCompletedAtAttribute($value) {
        if(starts_with($value, '00-00-00')) {
            return null;
        }
        return new Carbon($value);
    }
}