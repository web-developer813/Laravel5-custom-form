<?php

use Illuminate\Database\Seeder;
use App\phone_type;
class phoneTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array('Home','Office','Cell', 'Fax','Pager','Nextel','Other');
        foreach($data as $key =>$value){
            phone_type::create([
                'name' =>$value,
            ]);
        }

    }
}
