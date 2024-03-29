<?php
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder {
    public function run() {
        $modules = [
            [
                'name' => 'Creating Clarity',
                'slug' => 'home',
                'total_parts' => 2,
                'module_id' => 0,
                'free' => 1,
                'locks' => false
            ],
            [
                'name' => 'Welcome to Belief School',
                'slug' => 'welcome',
                'total_parts' => 1,
                'module_id' => 0,
                'locks' => false
            ],
            [
                'name' => 'Know your amazing self',
                'slug' => 'boomerang',
                'total_parts' => 0,
                'module_id' => 0
            ],
            [
                'name' => 'Limiting Beliefs',
                'slug' => 'un-stuck',
                'total_parts' => 2,
                'module_id' => 1
            ],
            [
                'name' => 'My amazing life',
                'slug' => 'visualise',
                'total_parts' => 2,
                'module_id' => 0
            ],
            [
                'name' => 'Facing out Fear',
                'slug' => 'fear-courage',
                'total_parts' => 2,
                'module_id' => 0
            ],
            [
                'name' => 'Who can I help?',
                'slug' => 'giving',
                'total_parts' => 2,
                'module_id' => 0
            ],
            [
                'name' => 'The Gratitude Effect',
                'slug' => 'gratitude',
                'total_parts' => 2,
                'module_id' => 0
            ],
            [
                'name' => 'Planning and Practice',
                'slug' => 'sustainable-change',
                'total_parts' => 2,
                'module_id' => 2
            ],
            [
                'name' => 'Here I am',
                'slug' => 'you-to-you',
                'total_parts' => 1,
                'module_id' => 0
            ]

        ];

        foreach($modules as $key => $module) {
            $module['order'] = $key;
            $module = new \App\Models\Module([$module]);
        }

    }
}