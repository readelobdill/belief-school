<?php
namespace App\Services;

use App\Models\Module;

class ModuleCompletion {

    protected $module;

    protected $validators = [
        'home' => [[], ['gender', 'age', 'want', 'why', 'how', 'why_not']],
        'checkboxes' => [['challenge']],
        'tag-cloud' => [],
        '3-fields' => [['challenge-1','challenge-2','challenge-3'],['response-1','response-2','response-3']],
        'dreamboard' => [],
        'diary' => [
            [
                'diary_1',
                'diary_2',
                'diary_3',
                'diary_4',
                'diary_5',
                'diary_6',
                'diary_7',
                'diary_8',
                'diary_9',
                'diary_10',
            ],
            ['letter']
        ],
        '2-fields' => [['i_chose']],
        'you-to-you' => [['letter']]

    ];

    public function __construct(Module $module) {
        $this->module = $module;
    }

    public function isValid($step, $data) {
        $step = $this->validators[$this->module->type][$step];
        foreach($data as $key => $value) {
            if(!in_array($key, $step)) {
                return false;
            }
        }
        return true;

    }
}