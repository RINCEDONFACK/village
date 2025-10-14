<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'image1',
        'image2',
        'lien_youtube1',
        'lien_youtube2',
        'likes_count',
    ];

    protected $casts = [
        'likes_count' => 'integer',
    ];

    /**
     * Relation avec les commentaires
     */
    public function culturecommentaires()
    {
        return $this->hasMany(CultureCommentaire::class);
    }

    /**
     * Relation avec les likes
     */
    public function cultureLikes()
    {
        return $this->hasMany(CultureLike::class);
    }

    /**
     * Vérifier si l'utilisateur a déjà liké
     */
    public function isLikedByUser($ipAddress)
    {
        return $this->cultureLikes()
            ->where('ip_address', $ipAddress)
            ->exists();
    }

    /**
     * Incrémenter le compteur de likes
     */
    public function incrementLikes()
    {
        $this->increment('likes_count');
    }

    /**
     * Décrémenter le compteur de likes
     */
    public function decrementLikes()
    {
        if ($this->likes_count > 0) {
            $this->decrement('likes_count');
        }
    }
}
