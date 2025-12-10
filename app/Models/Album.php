<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'photo1','photo2','photo3','photo4','photo5',
        'photo6','photo7','photo8','photo9','photo10',
    ];
}
