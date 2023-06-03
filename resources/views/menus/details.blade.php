@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex align-items-center">
                <!-- Back button -->
                <a href="{{ route('order.history') }}" class="back-button">
                    <i class="bx bx-arrow-back"></i>
                    <i class="bx bx-arrow-back bx-tada bx-flip-vertical"></i>
                </a>
                <h1>{{ $order->id }}</h1>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedItems = $items->groupBy('food_id');
                        @endphp

                        @foreach($groupedItems as $foodId => $groupedItem)
                            @php
                                $item = $groupedItem->first();
                                $food = $details->where('id', $item->food_id)->first();
                                $quantity = $groupedItem->sum('quantity');
                            @endphp

                            <tr>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><strong>Order Total: RM {{ $total }}</strong></p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .table {
        width: 100%;
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .table th,
    .table td {
        padding: 8px;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

    .table thead th {
        background-color: #f9f9f9;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table td:nth-child(1),
    .table td:nth-child(2),
    .table td:nth-child(3) {
        width: 30%;
    }

    /* .table td:last-child {
        text-align: center;
    } */

    .table td:last-child a {
        color: #337ab7;
        text-decoration: none;
    }

    .table td:last-child a:hover {
        text-decoration: underline;
    }

    .total {
        margin-top: 20px;
        font-weight: bold;
    }
    
    /* Styling for the back button */
    /* Add this CSS code to your stylesheet */
    .back-button {
        background: none;
        border: none;
        cursor: pointer;
        font-size:30px;
        margin-right: 10px;
    }

    .back-button i.bx-arrow-back.bx-flip-vertical {
        display: none;
    }

    .back-button:hover i.bx-arrow-back {
        display: none;
    }

    .back-button:hover i.bx-arrow-back.bx-flip-vertical {
        display: inline-block;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }


    
</style>

