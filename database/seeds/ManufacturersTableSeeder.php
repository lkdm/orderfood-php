<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Apple',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Samsung',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Microsoft',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}
