<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleUser extends Model {
    protected $table = 'module_user';

    public function __construct() {

    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function module() {
        return $this->belongsTo('App\Models\Module');
    }



    public function addTags(array $tags) {
        $data = json_decode($this->data);
        $data = array_merge($data, $tags);
        $this->data = json_encode($data);
    }



    public function addImage($imageName, $imageNumber) {
        $data = json_decode($this->data, true);
        $data['image_'.$imageNumber] = $imageName;
        $this->data = json_encode($data);
    }
}