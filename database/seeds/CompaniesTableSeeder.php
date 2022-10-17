<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => Str::random(10),
            'street_address' => Str::random(15),
            'representative_name' => random_int(1000, 10000)
        ]);
           
        //
    }
}
