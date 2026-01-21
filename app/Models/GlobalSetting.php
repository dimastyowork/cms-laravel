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
        'footer_url',
        'footer_link_text',
        'footer_link_url',
        'url',
    ];
}
