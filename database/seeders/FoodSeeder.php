<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the food categories and their corresponding names
        // Define the food categories and their corresponding names
        $categories = [
            'Sandwiches' => [
                ['Chicken Sandwich', 'Grilled or breaded chicken breast between two slices of bread or a bun with toppings like lettuce, tomato, and mayo.', true, 'chicken sandwich ok.png'],
                ['Veggie Sandwich', 'Fresh vegetables like lettuce, tomato, cucumber, and onions on bread with optional additions like cheese or hummus.', true, 'veggie sandwich ok.png'],
                ['Grilled Cheese Sandwich', 'Melted cheese between two slices of grilled or toasted bread.', true, 'grilled cheese ok.png'],
                ['Nutella Sandwich', 'Two slices of bread with a generous spread of Nutella, a chocolate hazelnut spread.', true, 'nutella ok.png'],
            ],
            'Burgers' => [
                ['Hawaiian Burger','Hawaiian burger incorporates a beef or chicken patty topped with a slice of grilled pineapple, crispy bacon, melted cheese, and lettuce.',true,'hawaiian ok.png'],
                ['Mushroom Burger','This burger features a juicy patty topped with imported mushrooms and melted Swiss cheese.',true,'mushroom ok.png'],
                ['Classic Burger','The classic cheeseburger features a juicy beef patty cooked to perfection, topped with melted cheese, lettuce, tomato, onions, pickles, and a dollop of ketchup or mayo.',true,'cheeseburger ok.png'],
                ['Veggie Burger','The veggie burger is a popular choice. Made with a patty consisting of vegetables, legumes, grains, or soy, it offers a satisfying texture and is often complemented with toppings like lettuce, tomato, onions, and special sauces.',true,'veggie ok.png'],
            ],
            'Noodles' => [
                ['Spicy Korean Noodles','Spicy Korean Noodles are instant noodles that have gained immense popularity for their intense spiciness.',true,'korean ok.png'],
                ['Tomyam Noodles','Instant Tomyam Noodles are inspired by the famous Thai soup called Tomyam. These instant noodles are flavoured with the distinct and tangy Tomyam soup base.',true,'tomyam ok.png'],
                ['Instant Curry Noodles','Instant Curry Noodles are a popular choice for those craving a quick and flavorful meal. These noodles are typically seasoned with a rich and savoury curry powder.',true,'curry ok.png'],
            ],
            'Drinks' => [
                ['Ice Milo','',true,'IceMilo.png'], 
                ['Ice Lemon Tea','',true,'icelemontea ok.png'], 
                ['Ice Tea','',true,'icetea ok.png'], 
                ['Ice Coffee','',true,'icecoffee ok.png'], 
                ['Orange Juice','',true,'orangejuice ok.png'], 
                ['Apple Juice','',true,'apple ok.png'],
            ],
            'Fried Rice' => [
                ['Yong Chow Fried Rice','Yong Chow Fried Rice is a popular Chinese-style fried rice that typically includes a combination of diced chicken, shrimp, Chinese sausage (lap cheong), and various vegetables like peas, carrots, and onions.',true,'yongchow ok.png'], 
                ['Ikan Bilis Fried Rice','Ikan Bilis Fried Rice is a Malaysian-style fried rice that features small dried anchovies, known as ikan bilis.',true,'billis ok.png'], 
                ['Tom Yam Fried Rice','Tom Yam Fried Rice is a Thai-inspired fried rice dish infused with the flavours of Tom Yam soup, which is known for its spicy and tangy taste.',true,'tomyam ok.png'], 
                ['Garlic Fried Rice','Garlic Fried Rice is a simple yet flavorful variation of fried rice that highlights the taste of garlic. The dish is prepared by stir-frying cooked rice with minced garlic and sometimes chopped onions.',true,'garlic ok.png'],
            ],
            'Western Food' => [
                ['Chicken Chop',"Chicken chop is a popular Western dish that features a grilled or pan-fried chicken breast or thigh. The chicken is seasoned with herbs and spices, cooked until it's juicy and tender.",true,'chicken chop ok.png'],
                ['Fish and Chips','Fish and chips is a beloved British dish that has become a global favourite. It consists of a fillet of white fish, typically cod or haddock, coated in a light batter and deep-fried until crispy and golden.',true,'fish ok.png'], 
                ['Grilled Chicken','Grilled chicken is a healthier alternative to fried chicken. It involves marinating chicken pieces, often boneless and skinless breasts or thighs, in a flavorful blend of herbs, spices, and sometimes a marinade sauce.',true,'grilled ok.png'], 
                ['Cordon Bleu',' Cordon Bleu is a classic dish that features a breaded and fried chicken breast stuffed with ham and cheese. The chicken breast is pounded thin, layered with slices of ham and cheese, rolled up, breaded, and then pan-fried or deep-fried until golden and crispy',true,'cordon ok.png'],
            ],
            'Snacks' => [
                ['French Fries','Crispy and golden potato fries, usually served hot and seasoned with salt or other seasonings.',true,'fries ok.png'], 
                ['Nachos','Crispy tortilla chips topped with melted cheese, salsa, guacamole, sour cream.',true,'nachos ok.png'], 
                ['Popcorn','Made from whole-grain corn kernels, it undergoes a fascinating transformation when heated. As the kernels are exposed to high heat, the moisture inside them turns into steam, causing the kernels to explode and create fluffy, light pieces of popcorn.',true,'popcorn ok.png'], 
                ['Fruit Cups','Fresh fruits, such as watermelon, pineapple, grapes, and berries, are served in a cup or container.',true,'fruit ok.png'],
                ['Chicken Wings','Deep-fried chicken wings coated in a variety of sauces like buffalo, barbecue, or teriyaki.',true,'wings ok.png'],
            ],
            'Wraps' => [
                ['Chicken Caesar Wrap','This wrap features grilled or roasted chicken slices wrapped in a soft tortilla, along with crisp romaine lettuce, grated Parmesan cheese, and a creamy Caesar dressing.',true,'chicken ok.png'],
                ['Veggie Hummus Wrap','A perfect choice for vegetarians, this wrap showcases a variety of fresh vegetables such as sliced cucumbers, bell peppers, shredded carrots, and leafy greens, all nestled in a tortilla spread with creamy hummus.',true,'veggie ok.png'],
                ['Spicy Buffalo Chicken Wrap','This wrap features tender and spicy buffalo chicken wrapped in a soft tortilla, along with crisp lettuce, diced tomatoes, shredded cheddar cheese, and a zesty ranch or blue cheese dressing.',true,'chicken buffalo ok.png'],
            ],
        ];


        // Seed the food data
        foreach ($categories as $category => $foods) {
            foreach ($foods as [$name, $description, $available, $pic]) {
                $price = $this->getFoodPrice($category, $name);
                $now = Carbon::now();

                DB::table('food')->insert([
                    'category' => $category,
                    'name' => $name,
                    'description' => $description,
                    'available' => $available,
                    'pic' => $pic,
                    'price' => $price,
                    'created_at' => $now,
                    'updated_at' => $now,
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
        if ($category === 'Sandwiches') {
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
        } elseif ($category === 'Burgers') {
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
        } elseif ($category === 'Wraps') {
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
        } elseif ($category === 'Snacks') {
            if($name === 'French Fries'){
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
        } elseif ($category === 'Western Food') {
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
        } elseif ($category === 'Fried Rice') {
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
        } elseif ($category === 'Noodles') {
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
        } elseif ($category === 'Drinks') {
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
