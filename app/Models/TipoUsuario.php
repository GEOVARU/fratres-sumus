<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipos_usuarios';

    protected $fillable = [
        'descripcion',
        'estado',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'tipo_usuario', 'id');
    }
}
