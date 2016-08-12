<?php
namespace App\Services;

use App\Models\Module;
use ImagickDraw;
use Imagick;

class DreamboardRenderer {


    protected $dreamboard;
    protected $user;

    protected $positions = [
        'image_2'    => ['x' => 235, 'y' => -5, 'rotation' => 5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_6'    => ['x' => -5, 'y' => 250, 'rotation' => -10, 'border' => 25, 'height' => 250, 'width' => 250],
        'image_1'    => ['x' => 10,  'y' => 30, 'rotation' => -5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_4'    => ['x' => 710, 'y' => 10, 'rotation' => -5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_5'    => ['x' => 945, 'y' => 50, 'rotation' => 5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_7'    => ['x' => 635, 'y' => 250 , 'rotation' => 5, 'border' => 25, 'height' => 250, 'width' => 250],
        'image_3'    => ['x' => 490, 'y' => 3, 'rotation' => 3, 'border' => 20, 'height' => 200, 'width' => 200],

        'image_8'    => ['x' => 930, 'y' => 320 , 'rotation' => -7, 'border' => 20, 'height' => 200, 'width' => 200],

        'image_9'    => ['x' => -3, 'y' => 575, 'rotation' => 5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_12'   => ['x' => 710, 'y' => 575, 'rotation' => -5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_10'   => ['x' => 233, 'y' => 600, 'rotation' => -5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_11'   => ['x' => 480, 'y' => 590, 'rotation' => 5, 'border' => 20, 'height' => 200, 'width' => 200],
        'image_main' => ['x' => 275, 'y' => 230, 'rotation' => -4, 'border' => 45, 'height' => 310, 'width' => 310],
    ];

    public function __construct($dreamboard, $user) {
        $this->dreamboard = $dreamboard;
        $this->user = $user;
    }

    public function renderToImage() {
        $dreamboardImage = new Imagick();
        $dreamboardImage->newImage(1200, 848, 'none');
        $background = new Imagick(public_path('img/dreamboard-backgrounds/'.$this->dreamboard->background.'.png'));

        foreach($this->positions as $key=>$value) {
            if($key !== 'background') {
                $image = new Imagick(public_path('uploads/dreamboard/'.$this->user->id.'/'.$this->dreamboard->$key));
                // $image->cropThumbnailImage($value['width'], $value['height']);
                $image->scaleImage($value['width'], $value['height']);
                $image->borderImage('white', $value['border'], $value['border']);
                $image->rotateImage('#00000000', $value['rotation']);

                $shadow = clone $image;
                $shadow->setImageBackgroundColor('black');
                $shadow->shadowImage( 50, 5, 10, 10 );
                $shadow->compositeImage( $image, Imagick::COMPOSITE_OVER, 0, 0 );

                if($key == 'image_main'){
                    $draw = new ImagickDraw();
                    $draw->setFont(public_path('fonts/2E98A4_0_0.ttf'));
                    $draw->setFontSize(30);
                    $shadow->annotateImage($draw, 100, 392.5, $value['rotation'], 'my beautiful life');
                }

                $dreamboardImage->compositeImage($shadow, imagick::COMPOSITE_OVER, $value['x'], $value['y']);
            }
        }

        $background->compositeImage($dreamboardImage, Imagick::COMPOSITE_OVER, 0, 0);
        $background->setImageFormat('jpeg');
        $background->setCompression(90);
        return $background;
    }



}
