<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = [
        'whatsapp',
        'whatsapp_link',
        'email',
        'address',
        'instagram',
        'is_instagram_active',
        'facebook',
        'is_facebook_active',
        'youtube',
        'is_youtube_active',
        'tiktok',
        'is_tiktok_active',
        'twitter',
        'is_twitter_active',
        'shopee_url',
        'shopee_username',
        'is_shopee_active',
        'tokopedia_url',
        'tokopedia_store_name',
        'is_tokopedia_active',
        'maps_embed_url',
        'is_maps_active',
    ];
}
