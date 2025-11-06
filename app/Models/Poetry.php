<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poetry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'translation',
        'audio_file',
        'author',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope untuk hanya mengambil poetry yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk order berdasarkan kolom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
