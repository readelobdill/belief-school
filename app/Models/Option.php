<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model {
    protected $fillable = ['key'];
    private static $allOptions = null;

    public static function getAll() {
        if(isset(self::$allOptions)) {
            return self::$allOptions;
        }
        self::$allOptions = static::all()->keyBy('key');
        return self::$allOptions;
    }
}