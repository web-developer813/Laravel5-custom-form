<?php

use Illuminate\Database\Seeder;
use App\contact_type;

class contactTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = array('Architect/Designer','Property Manager','Site Manager','Maintenance Manager','Owner','Other');
        foreach($data as $key =>$value){
            contact_type::create([
                'name' =>$value,
            ]);
        }
    }
}
