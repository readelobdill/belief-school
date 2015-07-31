<?php
namespace App\Services;

use App\Models\Module;
use Imagick;

class DreamboardRenderer {


    protected $dreamboard;
    protected $user;

    protected $positions = [
        'image_1' => ['x' => 111, 'y' => 0],
        'image_2' => ['x' => 111+ 195 + 27, 'y' => 0],
        'image_3' => ['x' => 111 + 195 *2 + 27*2, 'y' => 0],
        'image_4' => ['x' => 111 + 195 *3 + 27*3, 'y' => 0],
        
        'image_5' => ['x' => 0, 'y' => 129 + 40],
        'image_6' => ['x' => 195 + 27, 'y' => 129 + 40],
        'image_main' => ['x' => 195 * 2 + 27 * 2 - 30, 'y' => 129 + 40 - 20, 'width' => 253, 'height' => 167],
        'image_7' => ['x' => 195 * 3 + 27 * 3, 'y' => 129 + 40],
        'image_8' => ['x' => 195 * 4 + 27 * 4, 'y' => 129 + 40],
        
        'image_9' =>  ['x' => 111, 'y' => 129 * 2 + 40 * 2],
        'image_10' => ['x' => 111+ 195 + 27, 'y' => 129 * 2 + 40 * 2],
        'image_11' => ['x' => 111 + 195 *2 + 27*2, 'y' => 129 * 2 + 40 * 2],
        'image_12' => ['x' => 111 + 195 *3 + 27*3, 'y' => 129 * 2 + 40 * 2],
    ];

    public function __construct($dreamboard, $user) {
        $this->dreamboard = $dreamboard;
        $this->user = $user;
    }

    public function renderToImage() {
        $images = [];
        $dreamboardImage = new Imagick();
        $width = 1085;
        /*
         * rowWidth: 862
         * totalWidth: 1085
         * 111
         * gutter: 27
         * */
        $height = 467;
        $imageWidth = 195;
        $imageHeight = 129;
        $gutter = 20;
        $dreamboardImage->newImage($width, $height, 'none');

        foreach($this->dreamboard as $key => $imageName) {
            if($key !== 'image_main') {
                $image = new Imagick(public_path('uploads/dreamboard/'.$this->user->id.'/'.$imageName));
                $image->scaleImage($imageWidth, $imageHeight);
                $x = $this->positions[$key]['x'];
                $y = $this->positions[$key]['y'];
                $dreamboardImage->compositeImage($image, imagick::COMPOSITE_OVER, $x, $y);
            }
        }

        $image = new Imagick(public_path('uploads/dreamboard/'.$this->user->id.'/'.$this->dreamboard->image_main));
        $image->scaleImage($this->positions['image_main']['width'], $this->positions['image_main']['height']);
        $x = $this->positions['image_main']['x'];
        $y = $this->positions['image_main']['y'];
        $dreamboardImage->compositeImage($image, imagick::COMPOSITE_OVER, $x, $y);


        $dreamboardImage->setImageFormat('png');
        return $dreamboardImage;
    }



}