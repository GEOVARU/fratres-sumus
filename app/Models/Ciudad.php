<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_estado', 'nombre'];

    /**
     * Relación con el modelo Estado.
     * Una ciudad pertenece a un Estado.
     */
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }
}
