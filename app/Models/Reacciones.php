<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reacciones extends Model{
    use HasFactory;

    protected $table='reacciones';

    protected $fillable=[
        'user_id',
        'publicacion_id',
        'tipo'
    ];

}
