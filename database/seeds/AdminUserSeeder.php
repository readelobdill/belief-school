<?php
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder {
    public function run() {
        $group = Group::where('name', '=', 'Super Admin')->first();

        $user = new User(['name' => 'Gladeye Admin', 'email' => 'daniel@gladeye.co.nz', 'password' => Hash::make('password')]);
        $user->group()->associate($group);
        $user->save();

    }
}