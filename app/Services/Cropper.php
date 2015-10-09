<?php
namespace App\Services;
use Imagick;

class Cropper {

    protected $image;

    function __construct($image) {
        $this->image = new Imagick($image);
    }

    function crop($x,$y,$width,$height) {
        $this->image->cropImage($width, $height, $x, $y);
        $this->image->scaleImage(390, 258);
        return $this->image;
    }

}