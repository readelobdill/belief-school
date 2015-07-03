<?php
namespace App\Services;

use App\Models\Module;

class ModuleCompletion {

    protected $module;

    protected $validators = [
        '3_fields' => [
            'field_1',
            'field_2',
            'field_3'
        ]
    ];

    public function __construct(Module $module) {
        $this->module = $module;
    }

    public function isComplete($data) {

    }
}