<?php

use Illuminate\Database\Seeder;
use App\bid_status;
class bidStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bid_status::create([
            'bid_status_name' =>'create',
        ]);
        bid_status::create([
            'bid_status_name' =>'pending',
        ]);
        bid_status::create([
            'bid_status_name' =>'award',
        ]);

    }
}
