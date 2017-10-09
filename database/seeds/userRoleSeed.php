<?php

use Illuminate\Database\Seeder;

class userRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = App\User::all();
       foreach($users as $key =>$user){
           $roles = App\role::all();
           $random_role = rand(0,count($roles)-1);
           App\user_role::create([
                'user_id' =>$user->id,
                'role_id' =>$roles[$random_role]->id
           ]);
       }
    }
}
