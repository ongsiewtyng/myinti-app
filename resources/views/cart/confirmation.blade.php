@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Order Details</h1>

        <p>Order ID: {{ $order->id }}</p>
        <p>Total: RM {{ $order->total }}</p>

        <h2>Ordered Items</h2>
        @php
            $orderedItems = session('orderedItems');
        @endphp

        <ul>
        @if ($orderedItems)
            @foreach ($orderedItems as $orderedItem)
                <p>Food Name: {{ $orderedItem['food_name'] }}</p>
                <p>Quantity: {{ $orderedItem['quantity'] }}</p>
            @endforeach
        @endif
        </ul>


        <!-- Display any other relevant order details here -->


        <p>Thank you for your order!</p>
    </div>
@endsection
