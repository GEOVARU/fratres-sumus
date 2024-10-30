<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionesPreguntas extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_preguntas';
    protected $fillable = [
        'id_tipo_asignacion', 'id_pregunta', 'usuario_registro', 
        'usuario_actualiza', 'estado'
    ];

    public function tipoAsignacion()
    {
        return $this->belongsTo(TipoAsignaciones::class, 'id_tipo_asignacion');
    }

    public function pregunta()
    {
        return $this->belongsTo(Preguntas::class, 'id_pregunta');
    }
}
