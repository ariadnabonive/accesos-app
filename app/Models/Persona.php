<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'apellido',
        'documento_identidad',
        'email',    
        'telefono',
        'tipo_persona',
    ];

    // Relación con unidades a través de la tabla pivote
    public function unidades()
    {
        return $this->belongsToMany(Unidad::class, 'personas_unidades')
                    ->withPivot('tipo_relacion')  //(residente o visitante)
                    ->withTimestamps();
    }
}

