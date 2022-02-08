<?php

namespace App\Exports;

use App\Models\Regency;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegencyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Regency::all();
    }
}
