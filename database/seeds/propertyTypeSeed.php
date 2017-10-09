<?php

use Illuminate\Database\Seeder;
use App\property_type;
class propertyTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array('Apartment','Architect','Church', 'Commercial Real Estate','Condominium','Construction Management','Educational Institution', 'Hospital','Hotel','Industrial', 'Management', 'Nursing Home', 'Office/Shopping'.'Residence','Resort','Subcontractor','Vendor','Government','Other');
        foreach($data as $key =>$value){
            property_type::create([
                'name' =>$value,
            ]);
        }
    }
}
