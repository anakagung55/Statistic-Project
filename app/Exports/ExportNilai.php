<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportNilai implements FromView
{
    public function view(): View
    {
        return view('export', [
            'scores' => Nilai::all()
        ]);
    }
}