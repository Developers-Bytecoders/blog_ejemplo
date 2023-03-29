<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model{
    use HasFactory;

    protected $table='comentarios';

    protected $fillable=[
        'user_id',
        'publicacion_id',
        'comentario',
        'status'
    ];

}
