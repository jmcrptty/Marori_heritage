<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'subtitle',
        'description',
        'btn_primary_text',
        'btn_primary_link',
        'btn_secondary_text',
        'btn_secondary_link',
        'background_image',
        'enable_video_background',
        'video_youtube_id',
    ];

    protected $casts = [
        'enable_video_background' => 'boolean',
    ];
}
