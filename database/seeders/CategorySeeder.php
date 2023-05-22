<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Sandwiches', 'catpic' => 'sandwich.jpg'],
            ['name' => 'Burgers', 'catpic' => 'burger.jpg'],
            ['name' => 'Noodles', 'catpic' => 'noodles.jpg'],
            ['name' => 'Drinks', 'catpic' => 'drinks.png'],
            ['name' => 'Fried Rice', 'catpic' => 'fried rice.jpg'],
            ['name' => 'Western Food', 'catpic' => 'western food.jpg'],
            ['name' => 'Snacks', 'catpic' => 'snacks.jpg'],
            ['name' => 'Wraps', 'catpic' => 'wraps.jpg'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
