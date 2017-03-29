<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Branch;
use App\Department;
use App\Position;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $branches = Branch::all();
        $departments = Department::all();
        $positions = Position::all();

        // Default Account
        $user = new User();
        $user->employee_id = $faker->unique()->numberBetween($min = 1000, $max = 9000);
        $user->email = 'mobile@newsim.ph';
        $user->username = 'root';
        $user->password = bcrypt('password');
        $user->first_name = 'Daniel';
        $user->middle_name = '';
        $user->last_name = 'Bajana';
        $user->gender = 'male';
        $user->employment_status = 'active';
        $user->department = 'Information Technology';
        $user->position = 'Programmer';
        $user->branch = 'Makati';
        $user->type = 'super-admin';
        $user->remarks = $faker->text($maxNbChars = 100);
        $user->verified = true;
        $user->save();

        for ($i=0; $i < 100; $i++) {
            $user = new User();
            $user->employee_id = $faker->unique()->numberBetween($min = 1000, $max = 9000);
            $user->email = $faker->email;
            $user->username = $faker->unique()->userName;
            $user->password = bcrypt('password');
            $user->first_name = $faker->firstName;
            $user->middle_name = $faker->lastName;
            $user->last_name = $faker->lastName;
            $user->gender = $faker->randomElement(['male', 'female']);
            $user->employment_status = $faker->randomElement(['active', 'inactive']);
            $user->department = $faker->randomElement($departments->toArray())['name'];
            $user->position = $faker->randomElement($positions->toArray())['name'];
            $user->branch = $faker->randomElement($branches->toArray())['name'];
            $user->type = $faker->randomElement(['super-admin', 'admin', 'default']);
            $user->remarks = $faker->text($maxNbChars = 100);
            $user->save();
        }
    }
}
