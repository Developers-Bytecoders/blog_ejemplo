<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model{
    use HasFactory;

    protected $table='publicaciones';

    protected $fillable=[
        'user_id',
        'categoria_id',
        'titulo',
        'slug',
        'src_img',
        'contenido',
        'status'
    ];

}
