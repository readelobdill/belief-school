<?php
use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder {
    public function run() {
        $groups = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Super Admin'
            ],
            [
                'name' => 'User'
            ]
        ];

        foreach($groups as $group) {
            $g = new Group($group);
            $g->save();
        }
    }
}