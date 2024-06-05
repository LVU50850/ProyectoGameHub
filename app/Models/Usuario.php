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
        'juegos' => ' ', // Valor por defecto para el campo 'usuario'
        'avatar' => 'images/53zEj3U30oqN0OWZ1KZyMRifjxhWkDnPEl9afr9r.jpg',
    ];

    protected $casts =
        ["recomendados" => "array",];


    protected $hidden = ['id'];

    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}


