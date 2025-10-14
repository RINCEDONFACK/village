<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureCommentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'culture_id',
        'parent_id',
        'auteur',
        'email',
        'photo',
        'contenu',
        'is_approved',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    /**
     * Relation avec Culture
     */
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
}
