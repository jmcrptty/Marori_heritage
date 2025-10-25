<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
    ];

    /**
     * Scope to get items ordered by creation date (oldest to newest)
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
