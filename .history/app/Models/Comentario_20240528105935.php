<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'user_id',
        'juego_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function usuario()
{
    return $this->belongsTo(User::class, 'id_user');
}

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
}
