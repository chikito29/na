<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUser = factory(App\User::class)->make([
            'email' => 'mobile@newsim.ph',
            'username' => 'root',
            'password' => bcrypt('password'),
            'first_name' => 'Daniel',
            'middle_name' => 'Laid',
            'last_name' => 'Bajana',
            'employment_status' => 'active',
            'department' => 'Information Technology',
            'position' => 'Programmer',
        ]);
        $defaultUser->save();
        factory(App\User::class, 100)->create();
    }
}
