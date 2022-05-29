<?php

namespace App\Imports;

use App\Models\Certificado;
use App\Models\Curso;
use App\Models\User;
use Maatwebsite\Excel\Concerns\{ToModel, WithValidation};
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificadosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
            $curso = Curso::where('convocatoria', $row['codigo'])->first();
            $user = User::whereDni($row['cedula'])->count();

            if ($user > 0) {
                $user = User::whereDni($row[1])->first();
            } else {
                $user = User::create([
                    'nombre' => $row[2],
                    'rol_id' => 2,
                    'dni' => $row[1],
                    'clave' => sha1($row[1]),
                    'estado' => 1
                ]);
            }
            return new Certificado([
                'idUsuario' => $user->id,
                'idCurso' => $curso->id
            ]);
    }
}
