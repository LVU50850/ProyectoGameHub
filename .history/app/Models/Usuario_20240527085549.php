<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory;

    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','contrasenia','email', 'juegos', 'avatar'];
    protected $attributes = [
        'juegos' => 'NOGAMES', // Valor por defecto para el campo 'usuario'
    ];

    protected $hidden = ['id'];

}


