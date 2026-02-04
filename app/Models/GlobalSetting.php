<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = 'global_settings';

    protected $fillable = [
        'logo',
        'description',
        'address',
        'phone',
        'emergency_phone',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'whatsapp',
        'youtube',
        'tiktok',
        'footer_columns',
        'copyright_text',
    ];

    protected $casts = [
        'footer_columns' => 'array',
    ];
}
