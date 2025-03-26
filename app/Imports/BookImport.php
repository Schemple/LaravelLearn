<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, withHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Book([
            'title' => $row['title'],
            'author' => $row['author'],
            'published_year' => $row['published_year'],
            'stock' => $row['stock'],
            ]);
    }
}
