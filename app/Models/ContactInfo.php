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
        'facebook',
        'youtube',
        'weekday_hours',
        'saturday_hours',
        'sunday_hours',
        'whatsapp_response',
    ];
}
