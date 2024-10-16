<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;
    
    protected $table = 'roles';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'name',
        'descripcion',
    ];

    // Campos que no se deben incluir en la serialización
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Método para obtener usuarios relacionados (si aplica)
    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_rol');
    }
}
