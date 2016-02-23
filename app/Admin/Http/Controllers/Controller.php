<?php namespace App\Admin\Http\Controllers;

use App\Models\Option;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    protected $options;

    public function __construct()
    {
        $this->options = Option::all()->keyBy('key');
    }

}