<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsuariosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'nombre' => strtoupper($row['nombre']),
            'apellido' => strtoupper($row['apellido1'])." ". strtoupper($row['apellido2']),
            'correo' => $row['correo'],
            'usuario' => $row['nombre'] . $row['apellido1'],
            'sexo' => $row['sexo'],
            'telefono' => $row['telefono'],
            'rol_id' => $row['rol'],
            'dni' => $row['cedula'],
            'clave' => sha1($row['cedula']),
            'estado' => 1
        ]);
    }
}
