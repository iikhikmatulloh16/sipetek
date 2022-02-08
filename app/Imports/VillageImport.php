<?php

namespace App\Imports;

use App\Models\Village;
use Maatwebsite\Excel\Concerns\ToModel;

class VillageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Village([
            'id'            => $row[0],
            'district_id'   => $row[1],
            'name'          => $row[2],
            'slug'          => $row[3],
        ]);
    }
}
