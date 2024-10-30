<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaSemana extends Model
{
    use HasFactory;

    protected $table = 'dia_semana';
    protected $fillable = ['nombre'];

    public function asignaciones()
    {
        return $this->hasMany(Asignaciones::class, 'id_dia');
    }
}
