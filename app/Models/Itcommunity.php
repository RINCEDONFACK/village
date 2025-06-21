<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itcommunity extends Model
{
    use HasFactory;
    protected $table = 'it_trainings';

    protected $fillable = [
        'image',
        'titre',
        'reference',
        'description',
        'duree',
        'date_debut',
        'date_fin',
        'lieu',
        'formateur',
        'actif',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'actif' => 'boolean',
    ];
}
