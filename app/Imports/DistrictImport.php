<?php

namespace App\Imports;

use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;

class DistrictImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new District([
            'id'            => $row[0],
            'regency_id'    => $row[1],
            'name'          => $row[2],
            'slug'          => $row[3],
        ]);
    }
}