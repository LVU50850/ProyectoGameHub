<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory;

    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','contrasenia','email', 'juegos', 'avatar', 'favoritos'];
    protected $attributes = [
        'juegos' => 'NOGAMES', // Valor por defecto para el campo 'usuario'
        'avatar' => 'images/HkvHlCy4hKeGc5I1hgayU962hrpqJX06hrPnzNvv.jpg',
        'favoritos'=>[],
    ];

    protected $casts = [
        'favoritos' => 'array',
    ];
    protected $attributes = [
        'juegos' => 'NOGAMES', // Valor por defecto para el campo 'usuario'
        'avatar' => 'images/HkvHlCy4hKeGc5I1hgayU962hrpqJX06hrPnzNvv.jpg',
        'favoritos'=>[],
    ];

    protected $hidden = ['id'];

    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}


