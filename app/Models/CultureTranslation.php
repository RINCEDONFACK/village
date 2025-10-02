<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CultureTranslation extends Model
{
    protected $fillable = [
        'culture_id',
        'locale',
        'titre',
        'description'
    ];

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }

    // Scope pour filtrer par langue
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }
}
