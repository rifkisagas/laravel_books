<?php

namespace App\Exports;

use App\Models\book;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return book::all();
    }
}
