<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'image1',
        'image2',
        'lien_youtube1',
        'lien_youtube2',
    ];

    // Relation avec les traductions
    public function translations()
    {
        return $this->hasMany(CultureTranslation::class);
    }

    // Récupérer la traduction pour une langue donnée
    public function translation($locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Relation avec les commentaires
    public function culturecommentaires()
    {
        return $this->hasMany(Culturecommentaire::class, 'culture_id');
    }

    // Accesseur pour le titre traduit
    public function getTitreAttribute()
    {
        $translation = $this->translation();
        return $translation ? $translation->titre : '';
    }

    // Accesseur pour la description traduite
    public function getDescriptionAttribute()
    {
        $translation = $this->translation();
        return $translation ? $translation->description : '';
    }

    // Méthode helper pour récupérer toutes les traductions formatées
    public function getAllTranslations()
    {
        return $this->translations->keyBy('locale');
    }
}
