<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsPublicaciones extends Model{
    use HasFactory;

    protected $table='tags_publicaciones';

    protected $fillable=[
        'tag_id',
        'publicacion_id'
    ];

}
