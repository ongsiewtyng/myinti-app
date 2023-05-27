@extends('layouts.admin_home')

@section('content')
<body>
  <h1>Admin Order History</h1>

  <div class="order">
    <div class="order-id">Order ID: 1</div>
    <div class="food-item">Food Item: Pizza</div>
    <div class="status">
      <input type="checkbox" name="status" id="status1" class="status-toggle">
      <label for="status1">Completed</label>
    </div>
  </div>

  <div class="order">
    <div class="order-id">Order ID: 2</div>
    <div class="food-item">Food Item: Burger</div>
    <div class="status">
      <input type="checkbox" name="status" id="status2" class="status-toggle">
      <label for="status2">Pending</label>
    </div>
  </div>

  <!-- Add more divs for each order -->
</body>
@endsection

@section('styles')
<style>
    .order {
      border: 1px solid black;
      padding: 10px;
      margin-bottom: 10px;
    }

    .order-id {
      font-weight: bold;
    }

    .food-item {
      margin-bottom: 5px;
    }

    .status {
      margin-top: 5px;
    }

    .status-toggle {
      display: inline-block;
      vertical-align: middle;
      margin-right: 5px;
    }
</style>

@endsection