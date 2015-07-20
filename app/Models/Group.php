<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {
    protected $fillable = ['name'];


    public static function withName($name) {
        return static::where('name', '=', $name)->first();
    }
}