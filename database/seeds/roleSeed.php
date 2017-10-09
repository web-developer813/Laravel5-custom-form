<?php

use Illuminate\Database\Seeder;
use App\role;
class roleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::create([
            'role_name' =>'admin',
        ]);
        role::create([
            'role_name' =>'estimator',
        ]);
    }
}
