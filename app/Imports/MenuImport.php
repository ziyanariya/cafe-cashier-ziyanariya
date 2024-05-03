<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Menu([
            'nama_menu' => $row['1'],
            'harga' => $row['2'],
            'image' => $row['3'],
            'deskripsi' => $row['4'],
            'jenis_id' => $row['5'],
        ]);
    }
    // public function headingRow(): int
    // {
    //     return 3;
    // }
}
