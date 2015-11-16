<?php
namespace App\Services;
use Imagick;

class Cropper {

    public $image;

    function __construct($image) {
        $this->image = new Imagick($image);
    }

    function crop($x,$y,$width,$height) {
        $this->image = $this->correctOrientation($this->image);
        $this->image->cropImage($width, $height, $x, $y);
        $this->image->scaleImage(390, 258);
        return $this->image;
    }

    function fixOrientation() {
        $this->image = $this->correctOrientation($this->image);
        return $this->image;
    }


    function correctOrientation(Imagick $image) {
        switch ($image->getImageOrientation()) {
            case Imagick::ORIENTATION_TOPLEFT:
                break;
            case Imagick::ORIENTATION_TOPRIGHT:
                $image->flopImage();
                break;
            case Imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateImage("#000", 180);
                break;
            case Imagick::ORIENTATION_BOTTOMLEFT:
                $image->flopImage();
                $image->rotateImage("#000", 180);
                break;
            case Imagick::ORIENTATION_LEFTTOP:
                $image->flopImage();
                $image->rotateImage("#000", -90);
                break;
            case Imagick::ORIENTATION_RIGHTTOP:
                $image->rotateImage("#000", 90);
                break;
            case Imagick::ORIENTATION_RIGHTBOTTOM:
                $image->flopImage();
                $image->rotateImage("#000", 90);
                break;
            case Imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateImage("#000", -90);
                break;
            default: // Invalid orientation
                break;
        }
        $image->setImageOrientation(Imagick::ORIENTATION_TOPLEFT);
        return $image;
    }

}