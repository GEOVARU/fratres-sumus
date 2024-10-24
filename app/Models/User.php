<?php

namespace App\Models;

// Otras importaciones que podrías tener aquí

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'fotografia',
        'usuario_registro',
        'usuario_actualiza',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'correo_electronico_verified_at' => 'datetime',
        'tipo_documento_identificacion' => 'integer',
        'pais' => 'integer',
        'estado' => 'integer',
        'ciudad' => 'integer',
        'tipo_usuario' => 'integer',
        'condicion' => 'integer',
    ];

    /**
     * Relación con el modelo TipoUsuario.
     * Un usuario pertenece a un TipoUsuario.
     */
    public function TypeUser()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario', 'id');
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais', 'id');
    }
}
