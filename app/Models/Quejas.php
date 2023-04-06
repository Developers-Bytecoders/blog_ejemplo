<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quejas extends Model{
    use HasFactory;

    protected $table='quejas';

    protected $fillable=[
        'user_id',
        'queja',
        'status'
    ];

}
