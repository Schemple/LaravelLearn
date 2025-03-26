<?php

namespace App\Imports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\ToModel;

class RentalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rental([
            'user_id' => $row[1],
            'customer_id' => $row[2],
            'rental_date' => $row[3],
            'due_date' => $row[4],
            'return_date' => $row[5],
            'status' => $row[6],
            'created_at' => $row[7],
            'updated_at' => $row[8],
        ]);
    }
}
