<?php

use Illuminate\Database\Seeder;
use App\mail_to_type;
class mailToTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array('Yes','No','Returned', 'Deleted','Remove');
        foreach($data as $key =>$value){
            mail_to_type::create([
                'name' =>$value,
            ]);
        }
    }
}
