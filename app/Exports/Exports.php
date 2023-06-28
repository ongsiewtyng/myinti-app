<?php

namespace App\Exports;

use App\Exports\Collections\UsersCollection;
use App\Exports\Collections\BookingCollection;
use App\Exports\Collections\ApprovalCollection;
use App\Exports\Collections\OrdersCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class Exports implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Users' => new UsersCollection(),
            'Booking' => new BookingCollection(),
            'Approval' => new ApprovalCollection(),
            'Orders' => new OrdersCollection(),
        ];
    }
}
