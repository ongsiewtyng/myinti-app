<?php

namespace App\Exports\Collections;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;


class BookingCollection implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return Booking::join('facilities', 'booking.f_id', '=', 'facilities.id')
            ->join('sessions', 'booking.session_id', '=', 'sessions.id')
            ->join('users', 'booking.user_id', '=', 'users.id')
            ->select('booking.id', 'f_name as facility_name', 'sessions.rooms', 'sessions.time', 'booking.user_id', 'users.name')
            ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Facility Name', 'Room', 'Time', 'User ID', 'Name'];
    }

    public function title(): string
    {
        return 'Booking'; // Custom title for the sheet
    }

}
