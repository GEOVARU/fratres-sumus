<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $table = 'preguntas';
    protected $fillable = ['pregunta', 'usuario_registro', 'usuario_actualiza', 'estado'];

    public function reporteAsignaciones()
    {
        return $this->hasMany(ReporteAsignacion::class, 'id_pregunta');
    }
}
