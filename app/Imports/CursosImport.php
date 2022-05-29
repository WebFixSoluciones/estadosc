<?php

namespace App\Imports;

use App\Models\Curso;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CursosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Curso([
            'idCategoria' => $row['idcategoria'],
            'curso' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'fecha_inicio' => $row['inicio'],
            'fecha_final' => $row['fin'],
            'convocatoria' => $row['convocatoria'],
        ]);
    }
}
