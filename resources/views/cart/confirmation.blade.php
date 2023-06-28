@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Order Details</h1>

        <p>Order ID: {{ $order->id }}</p>
        <p>Total: RM {{ $total }}</p>

        <h2>Ordered Items</h2>

        <ul class="item-list">
            @php
                $uniqueItems = $items->unique('food_id');
            @endphp

            @foreach ($uniqueItems as $item)
                <li>
                    <span class="item-name">{{ $item->food->name }}</span><br>
                    @php
                        $categoryMap = [
                            'Burgers' => 'cafeBurgers',
                            'Drinks' => 'cafeDrinks',
                            'Fried Rice' => 'cafeFried',
                            'menu' => 'cafeMenu',
                            'Noodles' => 'cafeNoodles',
                            'Sandwiches' => 'cafeSandwiches',
                            'Snacks' => 'cafeSnacks',
                            'Western Food' => 'cafeWestern',
                            'Wraps' => 'cafeWraps',
                        ];

                        $defaultCategory = 'cafeSandwiches'; // Default directory
                        $categoryDirectory = $categoryMap[$item->food->category] ?? $defaultCategory;
                        $imagePath = "{$categoryDirectory}/{$item->food->pic}";
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="Food Image" class="item-pic"><br>
                    <span class="item-price">Price: RM {{ $item->food->price }}</span><br>
                    <span class="item-quantity">Quantity: {{ $items->where('food_id', $item->food_id)->sum('quantity') }}</span>
                </li>
            @endforeach
        </ul>

        <!-- Display any other relevant order details here -->
        
        <p class="thanks">Thank you for your order!</p>
        <!-- Add a button to go back home -->
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        <a href="{{ route('order.history') }}" class="btn btn-primary">Order History</a>
        <a href="{{ route('service2') }}" class="btn btn-primary order-more-btn">Order More</a>
    </div>
@endsection

@section('styles')
<style>
    .item-list {
        list-style-type: none;
        padding: 10px;
        margin: 0;
    }

    .item-list li {
        margin-bottom: 10px;
    }

    .item-name {
        font-size: 20px;
        font-weight: bold;
    }

    .item-pic {
        max-width: 20%;
        height: auto;
        margin-bottom: 5px;
    }

    .item-price,
    .item-quantity {
        font-size: 14px;
    }

    .thanks {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        background-color:#FFF672;
        padding: 10px;
        border-radius: 10px;
    }

    .order-more-btn {
        background-color: #ff9800; /* Change the background color to your desired color */
        color: white; /* Change the text color to ensure it's visible */
        float: right; /* Align the button to the right */
        margin-left: 10px; /* Add some margin to separate it from other buttons */
    }


</style>
