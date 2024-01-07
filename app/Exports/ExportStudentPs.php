<?php

namespace App\Exports;

use App\Models\lates;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStudentPs implements FromView
{
    protected $lates;

    public function __construct($lates)
    {
        $this->lates = $lates;
    }

    public function view(): View
    {
        $data = [
            'lates' => $this->lates,
        ];

        return view('latesPs.cetak_excelPs', $data);
    }
}