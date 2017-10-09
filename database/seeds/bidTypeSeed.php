<?php

use Illuminate\Database\Seeder;
use App\bid_type;
class bidTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bid_type::create([
            'name' =>'Standard',
        ]);
        bid_type::create([
            'name' =>'Custom',
        ]);

    }
}
