<?php
namespace App\Services;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

class Video {
    protected $video;
    protected $ffmpeg;
    public function __construct($path) {
        $this->ffmpeg = FFMpeg::create([
            'ffmpeg.binaries'  => env('FFMPEG_LOCATION', ['avconv', 'ffmpeg']),
            'ffprobe.binaries' => env('FFPROBE_LOCATION', ['avprobe', 'ffprobe']),
        ]);
        $this->video = $this->ffmpeg->open($path);
    }


    public function saveFirstFrame($path) {
        $frame = $this->video->frame(TimeCode::fromSeconds(0));
        $frame->save($path);

    }

    public function exportToMp4($path) {
        $this->video->save(new X264(), $path);
    }
}
