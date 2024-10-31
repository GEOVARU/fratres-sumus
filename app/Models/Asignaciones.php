<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';
    protected $fillable = [
        'usuario_interesado', 'usuario_asignado', 'hora_inicio', 'minuto_inicio', 
        'hora_fin', 'minuto_fin', 'id_dia', 'anio', 'estado', 'id_tipo_asignacion', 
        'usuario_registro', 'usuario_actualiza'
    ];

    // Relación con el modelo User
    public function interesado()
    {
        return $this->belongsTo(User::class, 'usuario_interesado', 'usuario');
    }

    public function asignado()
    {
        return $this->belongsTo(User::class, 'usuario_asignado', 'usuario');
    }

    public function registro()
    {
        return $this->belongsTo(User::class, 'usuario_registro', 'usuario');
    }

    public function actualiza()
    {
        return $this->belongsTo(User::class, 'usuario_actualiza', 'usuario');
    }

    // Relación con el modelo DiaSemana
    public function diaSemana()
    {
        return $this->belongsTo(DiaSemana::class, 'id_dia');
    }

    // Relación con el modelo TipoAsignaciones
    public function tipoAsignacion()
    {
        return $this->belongsTo(TipoAsignaciones::class, 'id_tipo_asignacion');
    }
}
