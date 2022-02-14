<?php

namespace App\Imports;

use App\Models\RekapAbsen;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new RekapAbsen([
            'kelas'     => $row[0],
            'hadir'     => $row[1],
            'sakit'     => $row[2],
            'izin'      => $row[3],
            'alpa'      => $row[4]
        ]);
    }
}
