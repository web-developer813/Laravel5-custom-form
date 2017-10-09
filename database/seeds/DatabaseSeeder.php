<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(userSeed::class);
         $this->call(roleSeed::class);
         $this->call(sourceSeed::class);
         $this->call(bidStatusSeed::class);
         $this->call(userRoleSeed::class);
         $this->call(phoneTypeSeed::class);
         $this->call(propertyTypeSeed::class);
         $this->call(contactTypeSeed::class);
         $this->call(mailToTypeSeed::class);
        $this->call(bidTypeSeed::class);
        $this->call(bidTemplateSeed::class);
    }
}
