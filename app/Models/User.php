<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'otros_nombres',
        'primer_apellido',
        'segundo_apellido',
        'tipo_documento_identificacion',
        'identificacion',
        'telefono_1',
        'telefono_2',
        'usuario',
        'correo_electronico',
        'password',
        'pais',
        'estado',
        'ciudad',
        'direccion',
        'colegiado',
        'tipo_usuario',
        'condicion',
        'usuario_registro',
        'usuario_actualiza',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario', 'id');
    }
}
