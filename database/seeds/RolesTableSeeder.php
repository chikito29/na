<?php

use Illuminate\Database\Seeder;
use App\User;
use Laravel\Passport\Client;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $roles = ['super-admin', 'admin', 'default'];
        $users = User::all();
        $applications = Client::all();

        foreach ($users as $user) {
            foreach ($applications as $application) {
                $role = new Role();
                $role->user_id = $user->id;
                $role->client_id = $application->id;
                $role->type = $faker->randomElement($roles);
                $role->save();
            }
        }
    }
}
