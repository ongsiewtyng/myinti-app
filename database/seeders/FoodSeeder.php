<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the food categories and their corresponding names
        $categories = [
            'sandwiches' => ['Chicken Sandwich', 'Grilled or breaded chicken breast between two slices of bread or a bun with toppings like lettuce, tomato, and mayo.',true,'chicken sandwich ok.png'],
                            ['Veggie Sandwich','Fresh vegetables like lettuce, tomato, cucumber, and onions on bread with optional additions like cheese or hummus.',true,'veggie sandwich ok.png'], 
                            ['Grilled Cheese Sandwich','Melted cheese between two slices of grilled or toasted bread.',true,'grilled cheese ok.png'], 
                            ['Nutella Sandwich','Two slices of bread with a generous spread of Nutella, a chocolate hazelnut spread.',true,'nutella ok.png'],
            'burgers' => ['Hawaiian Burger','Mushroom Burger', 'Classic Burger', 'Veggie Burger'],
            'noodles' => ['Spicy Korean Noodles', 'Tomyam Noodles', 'Instant Curry Noodles'],
            'drinks' => ['Ice Milo', 'Ice Lemon Tea','Ice Tea', 'Ice Coffee','Orange Juice', 'Apple Juice'],
            'fried rice' => ['Yong Chow Fried Rice', 'Ikan Bilis Fried Rice', 'Tom Yam Fried Rice','Garlic Fried Rice'],
            'western food' => ['Chicken Chop','Fish and Chips','Grilled Chicken', 'Cordon Bleu'],
            'snacks' => ['French Fries', 'Nachos','Popcorn','Fruit Cups','Chicken Wings'],
            'wraps' => ['Chicken Caesar Wrap', 'Veggie Hummus Wrap', 'Spicy Buffalo Chicken Wrap'],
        ];

        // Seed the food data
        foreach ($categories as $category => $foods) {
            foreach ($foods as $food) {
                $name = $food[0];
                $description = $food[1];
                $availability = $food[2];
                $image = $food[3];
                $price = $this->getFoodPrice($category, $name);

                DB::table('food')->firstOrCreate([
                    'category' => $category,
                    'name' => $name,
                ], [
                    'description' => $description,
                    'availability' => $availability,
                    'image' => $image,
                    'price' => $price,
                ]);
            }
        }

    }

    /**
     * Get the price for a food based on its category and name.
     *
     * @param string $category
     * @param string $name
     * @return float
     */
    private function getFoodPrice(string $category, string $name): float
    {
        // Set the default price
        $price = 0.00;

        // Assign prices based on the food category and name
        if ($category === 'sandwiches') {
            if ($name === 'Chicken Sandwich') {
                $price = 5.00;
            } elseif ($name === 'Veggie Sandwich') {
                $price = 4.50;
            } elseif ($name === 'Grilled Cheese Sandwich') {
                $price = 6.00;
            } elseif ($name === 'Nutella Sandwich') {
                $price = 5.50;
            } else {
                // Set default price for other sandwich types
                $price = 0.00;
            }
        } elseif ($category === 'burgers') {
            if ($name === 'Hawaiian Burger') {
                $price = 9.50;
            } elseif ($name === 'Mushroom Burger') {
                $price = 10.50;
            } elseif ($name === 'Classic Burger') {
                $price = 5.00;
            } elseif ($name === 'Veggie Burger') {
                $price = 10.00;
            } else {
                // Set default price for other burger types
                $price = 0.00;
            }
        } elseif ($category === 'wraps') {
            if($name === 'Chicken Caesar Wrap'){
                $price = 7.00;
            } elseif ($name === 'Veggie Hummus Wrap') {
                $price = 6.50;
            } elseif ($name === 'Spicy Buffalo Chicken Wrap') {
                $price = 8.50;
            } else {
                // Set default price for other wrap types
                $price = 0.00;
            }
        } elseif ($category === 'snacks') {
            if($name === ' French Fries'){
                $price = 4.50;
            } elseif ($name === 'Nachos') {
                $price = 5.00;
            } elseif ($name === 'Popcorn') {
                $price = 5.00;
            } elseif ($name === 'Fruit Cups') {
                $price = 3.50;
            } elseif ($name === 'Chicken Wings') {
                $price = 6.50;
            } else {
                // Set default price for other snack types
                $price = 0.00;
            }
        } elseif ($category === 'western food') {
            if($name === 'Chicken Chop'){
                $price = 10.50;
            } elseif ($name === 'Fish and Chips') {
                $price = 10.00;
            } elseif ($name === 'Grilled Chicken') {
                $price = 10.50;
            } elseif ($name === 'Cordon Bleu') {
                $price = 11.00;
            } else {
                // Set default price for other western food types
                $price = 0.00;
            }
        } elseif ($category === 'fried rice') {
            if($name === 'Yong Chow Fried Rice'){
                $price = 7.00;
            } elseif ($name === 'Ikan Bilis Fried Rice') {
                $price = 7.00;
            } elseif ($name === 'Tom Yam Fried Rice') {
                $price = 7.00;
            } elseif ($name === 'Garlic Fried Rice') {
                $price = 7.00;
            } else {
                // Set default price for other fried rice types
                $price = 0.00;
            }
        } elseif ($category === 'noodles') {
            if($name === 'Spicy Korean Noodles'){
                $price = 6.00;
            } elseif ($name === 'Tomyam Noodles') {
                $price = 6.00;
            } elseif ($name === 'Instant Curry Noodles') {
                $price = 10.50;
            } else {
                // Set default price for other noodle types
                $price = 0.00;
            }
        } elseif ($category === 'drinks') {
            if($name === 'Ice Milo'){
                $price = 2.50;
            } elseif ($name === 'Ice Lemon Tea') {
                $price = 2.00;
            } elseif ($name === 'Ice Tea') {
                $price = 2.00;
            } elseif ($name === 'Ice Coffee') {
                $price = 1.70;
            } elseif ($name === 'Orange Juice') {
                $price = 3.00;
            } elseif ($name === 'Apple Juice') {
                $price = 3.00;
            } else {
                // Set default price for other drink types
                $price = 0.00;
            }
        }
        // Add more conditions for other food categories and names

        return $price;
    }
}
