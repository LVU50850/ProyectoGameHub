<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory;

    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','contrasenia','email', 'juegos', 'avatar', 'favoritos', 'recomendados'];


    protected $attributes = [
        'juegos' => '', // Valor por defecto para el campo 'usuario'
        'avatar' => 'images/HkvHlCy4hKeGc5I1hgayU962hrpqJX06hrPnzNvv.jpg',
    ];

    protected $casts =
        ["recomendados" => "array",];


    protected $hidden = ['id'];

    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}


