<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ModuleUserPivot extends Pivot {
    protected $table = 'module_user';
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [
        'step' => 'integer',
    ];
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
            if(file_exists(public_path('uploads/dreamboard/'.\Auth::user()->id.'/'.$data->{$imageName}))) {
                unlink(public_path('uploads/dreamboard/'.\Auth::user()->id.'/'.$data->{$imageName}));
            }

        }
        $data->{$imageName} = $image;
        $this->data = $data;
    }

    public function addBackgroundImage($backgroundName) {
        clock($backgroundName);
        $data = $this->data;
        if(empty($data)) {
            $data = new \stdClass();
        }
        $data->background = $backgroundName;
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