<?php

namespace App\Exports\Collections;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersCollection implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return User::select('id', 'name', 'studentid', 'email')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Student ID', 'Email'];
    }

    public function title(): string
    {
        return 'Users'; // Custom title for the sheet
    }

}
