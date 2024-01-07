<?php

namespace App\Exports;

use App\Models\lates;
use App\Models\students;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStudent implements FromView
{
    public function view(): View
    {
        $data = [
            'students' => students::all(),
            'lates' => lates::all(),
        ];

        return view('lates.cetak_excel', $data);
    }
}