<?php

use Illuminate\Database\Seeder;
use App\User;

class userSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

     //   User::truncate();

        $password = \Hash::make('password');

        for ($i = 0; $i <= 10; $i++) {
            User::create([
                'first_name' =>$faker->name,
                'last_name' =>$faker->name,
                'user_name' => str_replace(' ', '_', $faker->name),
                'password' =>$password,

            ]);
        }
    }
}
