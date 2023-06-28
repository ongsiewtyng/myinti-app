<!-- resources/views/emails/receipt.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/kopi-senja-sans">
    <style>
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-logo {
            font-family: 'Kopi Senja Sans', sans-serif;
            font-size: 36px;
            margin-bottom: 20px;
            color:red;
        }
        .receipt-table {
            width: 100%;
        }
        .receipt-table th,
        .receipt-table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        .receipt-table th {
            font-weight: bold;
        }
        .receipt-total {
            text-align: right;
            margin-top: 20px;
        }
        .receipt-line {
            border-bottom: 1px dashed #ccc;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2 class="receipt-logo">MyINTI</h2>
            <h3>Order Receipt</h3>
        </div>

        <div class="row">
            <div class="col-6">
                <p><strong>Order Date:</strong> {{ $order->created_at->format('j F Y') }}</p>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>User:</strong> {{ $order->user->name }}</p>
            </div>
        </div>

        <table class="table receipt-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Payment</th>
                    <th>Order Type</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->food->name }}</td>
                        <td>{{ $item->food->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->payment }}</td>
                        <td>{{ $item->order_type }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
                <tr class="receipt-line">
                    <td colspan="5"></td>
                    <td><strong>Total: {{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="receipt-line"></div>

        <p class="receipt-total">Thank you for your order!</p>
    </div>
</body>
</html>
