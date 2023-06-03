@extends('layouts.admin_home')

@section('content')
<body>
  <h1 class="text-center">Admin Order History</h1>

  <div class="container justify-content-center">
    <div class="row">
      @foreach($orders as $order)
        @php
          $orderItems = $items->where('order_id', $order->id);
          $totalAmount = $orderItems->sum('total');
          $orderStatus = $orderItems->pluck('status')->unique()->first();
          $statusClass = $orderStatus === 'completed' ? 'completed' : 'pending';
        @endphp
      <div class="col-md-6">
        <div class="order card mb-4">
          <div class="card-header d-flex justify-content-between">
            <strong>Order ID: {{ $order->id }}</strong>
            <div class="status">
                <div class="toggle-status-text 
                    {{ $orderStatus === 'completed' ? 'text-success' : 'text-warning' }}
                    {{ $orderStatus === 'completed' ? 'non-clickable' : '' }}"
                    onclick="{{ $orderStatus !== 'completed' ? 'toggleStatus(event)' : '' }}"
                    data-order-id="{{ $order->id }}" data-status="{{ $orderStatus }}">
                    {{ $orderStatus === 'completed' ? 'Status: Completed' : 'Status: Pending' }}
                </div>
            </div>
          </div>
          <div class="card-body">
            @foreach($orderItems as $item)
              @php
                $foodItem = $food->where('id', $item->food_id)->first();
              @endphp
              <div class="item-details">
                <div><strong>Item:</strong> {{ $foodItem ? $foodItem->name : 'N/A' }}</div>
                <div><strong>Quantity:</strong> {{ $item->quantity }}</div>
                <div><strong>Price:</strong> RM {{ $item->food->price }}</div>
                <div><strong>Payment:</strong> {{ $item->payment }}</div>
              </div>
              <div class="item-spacing"></div>
            @endforeach
          </div>
          <div class="card-footer">
            <div class="order-total"><strong>Order Total:</strong> RM {{ $totalAmount }}</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</body>


  <script>
    function toggleStatus(event) {
      // Retrieve the CSRF token value from the meta tag
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

      var orderId = $(event.target).data('order-id');
      var currentStatus = $(event.target).data('status');
      var newStatus = currentStatus === 'completed' ? 'pending' : 'completed';

      $.ajax({
        url: '{{ route('updateStatus') }}',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
        },
        data: {
            order_id: orderId,
            new_status: newStatus,
        },
        success: function (response) {
            if (response.success) {
                // Update the status display dynamically
                $(event.target).data('status', newStatus);
                $(event.target).text('Status: ' + (newStatus === 'completed' ? 'Completed' : 'Pending'));

                // Update the class to make it clickable/non-clickable
                $(event.target).removeClass('non-clickable');
                if (newStatus === 'completed') {
                    $(event.target).addClass('non-clickable');
                }

                // Update the text color class based on the new status
                $(event.target).removeClass('text-warning text-success');
                if (newStatus === 'completed') {
                    $(event.target).addClass('text-success');
                } else {
                    $(event.target).addClass('text-warning');
                }
              } else {
                  alert('Failed to update status.');
              }
          },
          error: function () {
              alert('Failed to update status.');
          }
      });
    }

</script>


</body>
@endsection


@section('styles')
<style>
  .order {
    border: 1px solid black;
    padding: 10px;
    margin-bottom: 10px;
  }

  .food-item {
    margin-bottom: 5px;
  }

  .status {
    margin-top: 5px;
  }

  .item-spacing {
    margin-bottom: 10px;
  }

  .toggle-status-text {
    display: inline-block;
    padding: 0.5rem 1rem;
    border: 2px solid;
    border-radius: 5px;
    transition: border-color 0.3s;
  }

  .toggle-status-text:hover {
      cursor: pointer;
  }

  .toggle-status-text.text-warning {
      border-color: #ffc107;
  }

  .toggle-status-text.text-warning:hover {
      color: #fff;
      box-shadow: 0 0 10px rgba(255, 193, 7, 0.3);
      z-index:2;
  }

  .toggle-status-text.text-success[data-status="completed"] {
    color: #fff;
  }

  .non-clickable {
      pointer-events: none;
      /* opacity: 0.5; */
      /* Add any other styles you want for non-clickable status */
  }
</style>


@endsection