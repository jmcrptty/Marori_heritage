<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'subtitle',
        'who_title',
        'who_paragraph1',
        'who_paragraph2',
        'vision_title',
        'vision_text',
        'mission_text',
        'stat1_number',
        'stat1_label',
        'stat2_number',
        'stat2_label',
        'stat3_number',
        'stat3_label',
        'about_image',
    ];
}
