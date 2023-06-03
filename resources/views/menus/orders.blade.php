@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Order History</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('j F Y') }}</td>
                                <td>{{ $totals[$order->id] }}</td>
                                <td>
                                    <div class="box">
                                        <span class="status {{ $items->where('order_id', $order->id)->contains('status', 'completed') ? 'text-success' : 'text-warning' }}">
                                            {{ $items->where('order_id', $order->id)->contains('status', 'completed') ? 'Completed' : 'Pending' }}
                                        </span>
                                    </div>
                                </td>
                                <td><a href="{{ route('order.details', ['id' => $order->id]) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($orders->count() == 0)
                    <p>No orders was made</p>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('styles')
<style>
   .box {
        border-radius: 7px;
        padding: 5px 10px;
        display: inline-block;
        font-weight: bold;
    }

    .text-success {
        background-color: white;
    }

    .text-warning {
        background-color: white;
    }

    
</style>

@endsection

