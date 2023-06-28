<?php

namespace App\Exports\Collections;

use App\Models\Approval;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApprovalCollection implements FromCollection, WithHeadings, WithTitle,ShouldAutoSize
{
    use Exportable;

    public function collection(){
        return Approval::join('users as u1', 'approval.user_id', '=', 'u1.id')
            ->select('approval.id', 'u1.name as user_name', 'approval.club_name', 'approval.start_time', 'approval.end_time', 'approval.start_date', 'approval.end_date')
            ->get()
            ->map(function ($approval) {
                $startTime = Carbon::createFromFormat('H:i', $approval->start_time)->format('h:i A');
                $endTime = Carbon::createFromFormat('H:i', $approval->end_time)->format('h:i A');
                
                $approval->time = $startTime . ' - ' . $endTime;
                
                $startDate = Carbon::createFromFormat('Y-m-d', $approval->start_date)->format('j F Y');
                $endDate = Carbon::createFromFormat('Y-m-d', $approval->end_date)->format('j F Y');
                
                $approval->date = $startDate . ' - ' . $endDate;
                
                unset($approval->start_time, $approval->end_time, $approval->start_date, $approval->end_date);
                
                return $approval;
            });
    }

    public function headings(): array{
        return ['ID', 'Student Name', 'Club Name', 'Time', 'Date'];
    }


    public function title(): string
    {
        return 'Approval'; // Custom title for the sheet
    }

    
}
