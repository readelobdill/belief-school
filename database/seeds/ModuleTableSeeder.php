<?php
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder {
    public function run() {
        $modules = [
            [
                'name' => 'Home',
                'slug' => 'home'
            ],
            [
                'name' => 'Welcome to Belief School',
                'slug' => 'welcome'
            ],
            [
                'name' => 'Know your amazing self',
                'slug' => 'boomerang'
            ],
            [
                'name' => 'Limiting Beliefs',
                'slug' => 'un-stuck'
            ],
            [
                'name' => 'My amazing life',
                'slug' => 'visualise'
            ],
            [
                'name' => 'Fear and courage',
                'slug' => 'fear-courage'
            ],
            [
                'name' => 'Who can you help?',
                'slug' => 'giving'
            ],
            [
                'name' => 'Reach out',
                'slug' => 'gratitude'
            ],
            [
                'name' => 'Where to from here',
                'slug' => 'sustainable-change'
            ],
            [
                'name' => 'Here I am',
                'slug' => 'you-to-you'
            ]

        ];

        foreach($modules as $key => $module) {
            $module['step'] = $key;
            $module = new \App\Models\Module([$module]);
        }

    }
}