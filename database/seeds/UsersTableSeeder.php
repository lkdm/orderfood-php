<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some customers
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '123 Bob\'s House, Surfers Paradise, 4217.',
            'role' => 'customer'
        ]);
        DB::table('users')->insert([
            'name' => 'Fred',
            'email' => 'fred@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '123 Fred\'s House, Southport, 4214.',
            'role' => 'customer'
        ]);
        DB::table('users')->insert([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '123 Alice\'s House, Kingdom of Italy, 9999.',
            'role' => 'customer'
        ]);

        // Insert some restaurants (4, 5, 6)
        DB::table('users')->insert([
            'name' => 'Fathead Fred\'s Fried Flathead',
            'email' => 'fred.restaurant@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '33 Restaurant Lane, Rooservelt Island, 5555',
            'role' => 'restaurant'
        ]);
        DB::table('users')->insert([
            'name' => 'Beefy Bill\'s Broiled Beefsicles',
            'email' => 'bill.restaurant@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '54-99 Restaurant Lane, Rooservelt Island, 5555',
            'role' => 'restaurant'
        ]);
        DB::table('users')->insert([
            'name' => 'Slow Sally\'s Slow-cooked Silverfish',
            'email' => 'sally.restaurant@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '3 Cafe Parlour, Fort Knox, 6666',
            'role' => 'restaurant'
        ]);
        DB::table('users')->insert([
            'name' => 'Sabu\'s Salami Sizzle',
            'email' => 'sabu.restaurant@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '123, Near Kebab Rd, 4444',
            'role' => 'restaurant'
        ]);

        // Make an admimnistrator
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'address' => '777 My House Rd, Station Area, 555.',
            'role' => 'administrator'
        ]);
    }
}
