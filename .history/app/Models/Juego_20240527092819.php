<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{

    use HasFactory;

    protected $table = "juegos";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','usuario','imagen','comentario', 'descripcion'];
    protected $attributes = [
        'usuario' => 'admin', // Valor por defecto para el campo 'usuario'
        'comentario' => '',   // Valor por defecto para el campo 'comentario'
        'descripcion' => '',
    ];

    protected $hidden = ['id'];

}
