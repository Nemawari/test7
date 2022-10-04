<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'company_id' => Str::random(10),
            'product_name' => Str::random(15),
            'price' => random_int(1000, 10000),
            'stock' => random_int(100, 1000),
        ]);
        //
    }
}
