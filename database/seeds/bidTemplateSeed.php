<?php

use Illuminate\Database\Seeder;
use App\bid_template;
class bidTemplateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bid_template::create([
            'name' =>'Chesapeake Finishing',
        ]);
        bid_template::create([
            'name' =>'Chesapeake Finishing, CA',
        ]);
        bid_template::create([
            'name' =>'Chesapeake Finishing, OR',
        ]);
        bid_template::create([
            'name' =>'CFI Group-US',
        ]);
        bid_template::create([
            'name' =>'Chesapeake Group, LLC - CA',
        ]);
    }
}
