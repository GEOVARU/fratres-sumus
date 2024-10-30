<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_pais', // ID del país al que pertenece el estado
        'nombre',   // Nombre del estado o departamento
    ];

    // Definición de la relación con el modelo Pais
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }
}
