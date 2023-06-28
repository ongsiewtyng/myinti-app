<?php

namespace App\Exports\Collections;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class OrdersCollection implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        return Items::join('food', 'items.food_id', '=', 'food.id')
            ->select('items.id', 'food.name as food_name', 'items.total', 'items.quantity', 'items.order_type')
            ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Food Name', 'Total', 'Quantity', 'Order Type'];
    }

    public function title(): string
    {
        return 'Orders'; // Custom title for the sheet
    }
}
