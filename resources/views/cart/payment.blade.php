<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            color: green;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td:first-child {
            padding-right: 20px;
        }

        /* Image Styles */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Input Styles */
        input[type="radio"] {
            margin-right: 10px;
        }

        /* Button Styles */
        input[type="submit"] {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
        }

        select {
            font-size: 1.2em;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>


<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for placing an order! Here is your order summary:</p>
    <table>
        <thead>
            <tr>
                <th>Picture</th>
                <th>Food Name</th>
                <th>Unit Price</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="burger.jpg"></td>
                <td><strong style="font-size: 1.2em;">Burger</strong></td>
                <td><strong style="font-size: 1.2em;">RM10.00</strong></td>
            </tr>
            <tr>
                <td><img src="mee hoon.jpg"></td>
                <td><strong style="font-size: 1.2em;">Mee hoon</strong></td>
                <td><strong style="font-size: 1.2em;">RM8.00</strong></td>
            </tr>
            <tr>
                <td><img src="mee goreng.jpg"></td>
                <td><strong style="font-size: 1.2em;">Mee goreng</strong></td>
                <td><strong style="font-size: 1.2em;">RM6.00</strong></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong style="font-size: 1.2em;">RM24.00</strong></td>
            </tr>
        </tbody>

    </table>
    <br>
    <p>Please select your preference:</p>
    <label><input type="radio" name="preference" value="dine-in"> Dine In</label><br><br />
    <label><input type="radio" name="preference" value="takeaway"> Takeaway</label><br>
    <br>
    <p>Please select your payment method:</p>
    <select name="payment-method">
        <option value="Debit-card">Debit-card</option>
        <option value="Touch-N-Go">Touch-N-Go</option>
    </select>
    <br><br>
</body>

<form action="connect.php" method="POST">
    <input type="submit" value="Place Order">
</form>
</html>