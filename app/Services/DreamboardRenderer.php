<?php
namespace App\Services;

use App\Models\Module;
use Imagick;

class DreamboardRenderer {


    protected $dreamboard;
    protected $user;

    protected $positions = [
        'image_1' => ['x' => 111, 'y' => 0],
        'image_2' => ['x' => 333, 'y' => 0],
        'image_3' => ['x' => 555, 'y' => 0],
        'image_4' => ['x' => 777, 'y' => 0],

        'image_5' => ['x' => 0, 'y' => 169],
        'image_6' => ['x' => 222, 'y' => 169],
        'image_main' => ['x' => 414, 'y' => 149, 'width' => 253, 'height' => 167],
        'image_7' => ['x' => 666, 'y' => 169 ],
        'image_8' => ['x' => 888, 'y' => 169 ],

        'image_9' =>  ['x' => 111, 'y' => 338],
        'image_10' => ['x' => 333, 'y' => 338],
        'image_11' => ['x' => 555, 'y' => 338],
        'image_12' => ['x' => 777, 'y' => 338],
    ];

    public function __construct($dreamboard, $user) {
        $this->dreamboard = $dreamboard;
        $this->user = $user;
    }

    public function renderToImage($includeTitle = false) {
        $images = [];
        $dreamboardImage = new Imagick();
        $width = 1200;
        /*
         * rowWidth: 862
         * totalWidth: 1085
         * 111
         * gutter: 27
         * */
        $height = $includeTitle? 800 : 630;
        $imageWidth = 195;
        $imageHeight = 129;
        $gutter = 20;
        $dreamboardImage->newImage(1200, 630, 'none');

        $baseline = $includeTitle? 170 : 0;
        $bg = $includeTitle? 'img/dreamboard-generated-bg-2.jpg' : 'img/dreamboard-generated-bg.jpg';

        $background = new Imagick(public_path($bg));
        //$dreamboardImage->compositeImage($background, imagick::COMPOSITE_OVER, 0, 0);

        foreach($this->dreamboard as $key => $imageName) {
            if($key !== 'image_main') {
                $image = new Imagick(public_path('uploads/dreamboard/'.$this->user->id.'/'.$imageName));
                $image->scaleImage($imageWidth, $imageHeight);
                $image->borderImage('white', 2, 2);
                $x = $this->positions[$key]['x'] + 57;
                $y = $this->positions[$key]['y'] + 81;
                $dreamboardImage->compositeImage($image, imagick::COMPOSITE_OVER, $x, $y);
            }
        }

        $image = new Imagick(public_path('uploads/dreamboard/'.$this->user->id.'/'.$this->dreamboard->image_main));
        $image->scaleImage($this->positions['image_main']['width'], $this->positions['image_main']['height']);
        $image->borderImage('white', 2, 2);
        $x = $this->positions['image_main']['x'] + 57;
        $y = $this->positions['image_main']['y'] + 81;
        $dreamboardImage->compositeImage($image, imagick::COMPOSITE_OVER, $x, $y);


        $degrees = array( 0.01, 0.001, 0.001, 1.0 );
        $dreamboardImage->distortImage( Imagick::DISTORTION_BARRELINVERSE, $degrees, TRUE );
        $background->compositeImage($dreamboardImage, Imagick::COMPOSITE_OVER, 0,$baseline);
        $background->setImageFormat('jpeg');
        $background->setCompression(90);
        return $background;
    }



}
