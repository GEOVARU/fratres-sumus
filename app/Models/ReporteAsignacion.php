<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteAsignacion extends Model
{
    use HasFactory;

    protected $table = 'reporte_asignacion';
    protected $fillable = [
        'id_pregunta', 'id_asignacion', 'respuesta', 'usuario_registro', 
        'usuario_actualiza', 'estado'
    ];

    public function pregunta()
    {
        return $this->belongsTo(Preguntas::class, 'id_pregunta');
    }

    public function asignacion()
    {
        return $this->belongsTo(Asignaciones::class, 'id_asignacion');
    }
}
