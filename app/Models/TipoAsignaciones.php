<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAsignaciones extends Model
{
    use HasFactory;

    protected $table = 'tipo_asignaciones';
    protected $fillable = ['descripcion', 'estado'];

    public function asignaciones()
    {
        return $this->hasMany(Asignaciones::class, 'id_tipo_asignacion');
    }
}
