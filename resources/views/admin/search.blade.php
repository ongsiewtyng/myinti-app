@extends('layouts.admin_home')

@section('content')
    <div class="container">
        <h1 class="mb-4">Search Results</h1>

        <h2>Users</h2>
        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <ul class="list-group mb-4">
                @foreach ($users as $user)
                    <li class="list-group-item">
                        <span style="font-size: 20px;">{{ $user->name }}</span> <br>
                        <span class="font-weight-bold">{{ strtoupper($user->studentid) }}</span><br>
                        <span class="text-muted">Email: {{ $user->email }}</span>
                    </li>
                @endforeach
            </ul>

            @if (!$userOrders->isEmpty())
                <h3>Order History</h3>
                <ul class="list-group mb-4">
                    @foreach ($userOrders as $order)
                        <li class="list-group-item">
                            <a href="{{ route('order', ['id' => $order->id]) }}" style="text-decoration: none;">
                                Order ID: {{ $order->id }}
                            </a>
                        </li>
                        <!-- Display other order details -->
                    @endforeach
                </ul>
            @endif

            @if (!$userApprovals->isEmpty())
                <h3>Approvals</h3>
                <ul class="list-group mb-4">
                    @foreach ($userApprovals as $approval)
                        <li class="list-group-item">Approval ID: {{ $approval->id }}</li>
                        <!-- Display other approval details -->
                    @endforeach
                </ul>
            @endif

            @if (!$userMessage->isEmpty())
                <h3>Messages</h3>
                <ul class="list-group mb-4">
                    @foreach ($userMessage as $message)
                        <li class="list-group-item">Message ID: {{ $message->id }}</li>
                        <!-- Display other message details -->
                    @endforeach
                </ul>
            @endif
        @endif

        @if (!$foods->isEmpty())
            <h2>Foods</h2>
            <ul class="list-group mb-4">
                @foreach ($foods as $food)
                    <li class="list-group-item">{{ $food->name }}</li>
                @endforeach
            </ul>
        @endif

        @if (!$facilities->isEmpty())
            <h2>Facilities</h2>
            <ul class="list-group">
                @foreach ($facilities as $facility)
                    <li class="list-group-item">{{ $facility->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection