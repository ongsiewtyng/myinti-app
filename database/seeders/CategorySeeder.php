<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
            ['category' => 'Sandwiches', 'catpic' => 'sandwich.jpg'],
            ['category' => 'Burgers', 'catpic' => 'burgers.jpg'],
            ['category' => 'Noodles', 'catpic' => 'noodles.jpg'],
            ['category' => 'Drinks', 'catpic' => 'drinks.png'],
            ['category' => 'Fried Rice', 'catpic' => 'fried rice.jpg'],
            ['category' => 'Western Food', 'catpic' => 'western food.jpg'],
            ['category' => 'Snacks', 'catpic' => 'snacks.png'],
            ['category' => 'Wraps', 'catpic' => 'wraps.jpg'],
        ];

        $currentTimestamp = Carbon::now();

        foreach ($categories as $category) {
            $category['created_at'] = $currentTimestamp;
            $category['updated_at'] = $currentTimestamp;
            DB::table('category')->insert($category);
        }
    }
}
