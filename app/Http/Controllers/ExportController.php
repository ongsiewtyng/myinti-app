<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\Exports;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportData()
    {
        return Excel::download(new Exports(), 'MyINTI.xlsx');
    }
}
