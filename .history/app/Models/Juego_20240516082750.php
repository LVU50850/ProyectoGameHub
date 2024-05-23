<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    use HasFactory;

    protected $table = "juegos";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','usuario','email','comentario'];

    protected $hidden = ['id'];

}