<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{

    use HasFactory;

    protected $table = "juegos";

    protected $primaryKey = "id";

    protected $fillable = ['nombre','imagen'];

    protected $hidden = ['id'];

}
