<?php

namespace App\Imports;

use App\Models\CategoriaCurso;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new CategoriaCurso([
            'categoria' => $row['categoria']
        ]);
    }
}
