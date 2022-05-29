<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUsuario',
        'idCurso',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'idUsuario');
    }

    public function curso()
    {
        return $this->hasOne(Curso::class, 'id', 'idCurso');
    }
}
