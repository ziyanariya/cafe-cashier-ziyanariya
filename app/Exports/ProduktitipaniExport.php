<?php

namespace App\Exports;

use App\Models\Produktitipan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProduktitipaniExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produktitipan::all();
    }
}
