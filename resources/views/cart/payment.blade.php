@extends('layouts.cafe')

@section('content')
    <h1 style="text-align: center; margin-bottom: 20px; font-family:Anuphan">Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="info-container">
        @if ($cartItems->isEmpty())
            <div class="alert alert-info">
            Your cart is empty.
            </div>
        <a href="{{ route('service2') }}" class="btn btn-primary">Start Ordering</a>
        @else
    </div>

    <div class="container">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Delete</th>
                        <!-- <th>Picture</th> -->
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupedItems = $cartItems->groupBy('name');
                    @endphp

                    @foreach ($groupedItems as $name => $items)
                        @php
                            $quantity = $items->sum('quantity');
                            $total = $items->sum('total');
                        @endphp

                        <tr>
                            <td>{{ $name }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $items->first()->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-btn">
                                        <i class="bx bx-trash"></i>
                                        <i class='bx bx-trash bx-tada'></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $items->first()->id) }}" method="POST" class="update-form">
                                    @csrf
                                    @method('PATCH')
                                    <div class="quantity-container" data-item-id="{{ $items->first()->id }}">
                                        <input type="number" name="quantity" value="{{ $quantity }}" class="quantity-input">
                                    </div>
                                </form>
                            </td>
                            <td>{{ $total }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    @php
                        $total = $groupedItems->sum(function ($items) {
                            return $items->sum('total');
                        });
                    @endphp

                    <tr>
                        <td colspan="2"></td>
                        <td class="total-label" style="font-weight:bold;">Total:</td>
                        <td class="total-value">RM {{ number_format($total, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="payment-label" style="font-weight:bold;">Payment:</td>
                        <td class="payment-value">
                            <form action="{{ route('cart.updatePayment', $cartItems->first()->user_id) }}" method="POST" class="update-pay">
                                @csrf
                                @method('PATCH')
                                <select name="payment" class="payment-select" id="payment">
                                    <option value="Cash" {{ $cartItems->first()->payment === 'Cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="Online Banking" {{ $cartItems->first()->payment === 'Online Banking' ? 'selected' : '' }}>Online Banking</option>
                                    <option value="Card" {{ $cartItems->first()->payment === 'Card' ? 'selected' : '' }}>Card</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="order-label" style="font-weight:bold;">Order Type:</td>
                        <td class="order-value">
                            <form action="{{ route('cart.updateOrder', $cartItems->first()->user_id) }}" method="POST" class="update-order">
                                @csrf
                                @method('PATCH')
                                <select name="order_type" id="order_type" class="order-type-select">
                                    <option value="Dine In" {{ $cartItems->first()->order_type === 'Dine In' ? 'selected' : '' }}>Dine In</option>
                                    <option value="Takeaway" {{ $cartItems->first()->order_type === 'Takeaway' ? 'selected' : '' }}>Takeaway</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="cart-buttons">
            <a href="{{ route('service2') }}" class="btn btn-primary">Continue Ordering</a>
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Checkout</a>
        </div>
    </div>
    @endif

    <script>
        $(document).ready(function() {
            $('.quantity-input').on('input', function() {
                var form = $(this).closest('.update-form');
                form.submit();
            });

            $('.payment-select').on('change', function() {
                var form = $(this).closest('.update-pay');
                form.submit();
            });

            $('.order-type-select').on('change', function() {
                var form = $(this).closest('.update-order');
                form.submit();
            });
        });
        </script>
@endsection

@section('styles')
<style>
    /* Styling for the cart section */
    .cart-section {
        text-align: center;
        margin-bottom: 20px;
        font-family: 'Anuphan', sans-serif;
    }

    /* Styling for the success message */
    .alert.alert-success {
        width: 300px;
        text-align: center;
        margin: 20 auto;
    }
    .info-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }


    /* Styling for the info message */
    .alert.alert-info {
        width: 330px;
        margin-bottom: 10px;
        text-align: center;
        margin: 20 auto;
        font-size: 20px;
    }

    
    /* Styling for the table */
    /* .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
    } */

    .table-container {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    /* Styling for the remove button */
    .remove-btn {
        background: none;
        border: none;
        cursor: pointer;
    }

    .remove-btn i.bx-trash.bx-tada {
        display: none;
    }

    .remove-btn:hover i.bx-trash {
        display: none;
    }

    .remove-btn:hover i.bx-trash.bx-tada {
        display: inline-block;
    }
    .cart-buttons {
        text-align: right;
    }



    /* Styling for the payment select */
    select[name="payment"] {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        width: 100%;
    }

    /* Styling for the order type select */
    select[name="order_type"] {
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        width: 100%;
    }

    /* Styling for the quantity label */
    input[type="number"]{
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        width: 20%;
    }
</style>