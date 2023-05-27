@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $order->id }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                @foreach ($details as $food)
                                    @if ($food->id == $item->food_id)
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->price }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><strong>Order Total: RM {{ $total }}</p></strong>
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
</style>

