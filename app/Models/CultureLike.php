<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'culture_id',
        'ip_address',
        'user_agent',
    ];

    /**
     * Relation avec Culture
     */
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
}
