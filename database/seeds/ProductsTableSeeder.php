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
            'name' => 'Apple iPhone 6',
            'price' => '600',
            'manufacturer_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung Note 4',
            'price' => '567',
            'manufacturer_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('products')->insert([
            'name' => 'Nokia 8810',
            'price' => '432',
            'manufacturer_id' => 3,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
