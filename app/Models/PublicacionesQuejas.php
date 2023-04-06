<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionesQuejas extends Model{
    use HasFactory;

    protected $table='publicaciones_quejas';

    protected $fillable=[
        'user_id',
        'publicacion_id'
    ];

}
