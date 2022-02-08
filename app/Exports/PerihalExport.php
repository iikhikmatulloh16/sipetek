<?php

namespace App\Exports;

use App\Models\Perihal;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerihalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perihal::all();
    }
}
