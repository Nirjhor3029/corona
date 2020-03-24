<?php

namespace App\Imports;

use App\Data;
use Maatwebsite\Excel\Concerns\ToModel;

// copy
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return $row;
        return new Data([
            'name'     => null,
            'mobile'    => $row[0], 
            'service_type'    => $row[1], 
            'living_area'    => null, 
            'date_time'    => null, 
            // 'password' => \Hash::make($row[2]),
        ]);
    }
}
