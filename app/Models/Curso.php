<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'idCategoria', 'curso', 'descripcion', 'fecha_inicio', 'fecha_final', 'imagen', 'convocatoria'
    ];
}
