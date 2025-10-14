<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitTraditionnel extends Model
{
    use HasFactory;

    // Spécifier le nom exact de la table
    protected $table = 'produits_traditionnels';

    protected $fillable = [
        'nom',
        'categorie',
        'description',
        'image',
        'image1',
        'prix',
        'quantite',
        'disponible',
        'est_expose',
        'origine',
        'createur',
        'materiaux',
        'culture_associee',
        'contact_whatsapp',
        'contact_gmail',
    ];

    // Optionnel : Cast des attributs
    protected $casts = [
        'prix' => 'decimal:2',
        'quantite' => 'integer',
        'disponible' => 'boolean',
        'est_expose' => 'boolean',
    ];
}
