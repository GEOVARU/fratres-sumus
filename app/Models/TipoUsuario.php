<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no sigue la convención
    protected $table = 'tipos_usuarios';

    // Si necesitas especificar qué campos son asignables
    protected $fillable = ['descripcion', 'estado'];

    /**
     * Relación con el modelo User.
     * Un tipo de usuario puede tener muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'tipo_usuario', 'id');
    }
}
