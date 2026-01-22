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
        'email',
        'facebook',
        'twitter',
        'instagram',
        'footer_columns',
        'copyright_text',
    ];

    protected $casts = [
        'footer_columns' => 'array',
    ];
}
