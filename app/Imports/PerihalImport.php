<?php

namespace App\Imports;

use App\Models\Perihal;
use Maatwebsite\Excel\Concerns\ToModel;

class PerihalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perihal([
            'name' => $row[1],
            'slug' => $row[2]
        ]);
    }
}

