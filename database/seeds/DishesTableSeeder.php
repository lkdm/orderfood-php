<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Flat Head Fred's dishes
        DB::table('dishes')->insert([
            'user_id' => 4,
            'name' => 'The Fat-Free Fatstack',
            'price' => 14.99,
            'photo' => 'fathead-stack.png',
            'approved' => TRUE
        ]);
        DB::table('dishes')->insert([
            'user_id' => 4,
            'name' => 'Flathead Rounders',
            'price' => 9.99,
            'photo' => 'flathead-rounders.png',
            'approved' => TRUE
        ]);
        DB::table('dishes')->insert([
            'user_id' => 4,
            'name' => 'Fathead\'s Potato Thins',
            'price' => 4.99,
            'photo' => 'flathead-chips.png',
            'approved' => TRUE
        ]);
        // Insert Beefy Bill's dishes
        DB::table('dishes')->insert([
            'user_id' => 5,
            'name' => 'Vegan Steak (made from 100% real vegan cow)',
            'price' => 32.97,
            'photo' => 'beefy-steak.png',
            'approved' => TRUE
        ]);
        DB::table('dishes')->insert([
            'user_id' => 5,
            'name' => 'Area 51 Steak (made from 100% real alien)',
            'price' => 199.97,
            'photo' => 'beefy-area51.png',
            'approved' => FALSE
        ]);
        DB::table('dishes')->insert([
            'user_id' => 5,
            'name' => 'The "not steak" Steak',
            'price' => 0.99,
            'photo' => 'notsteak.png',
            'approved' => True
        ]);
        // Sally has no dishes
    }
}
