<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'bio',
        'photo',
        'status',
        'experience_years',
        'rating',
        'reviews_count',
        'is_active',
        'sort_order',
    ];

    protected $appends = ['photo_url'];

    /**
     * Get the doctor's photo with default profile image fallback
     */
    protected function casts(): array
    {
        return [
            'photo' => 'string',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the photo URL with default fallback
     */
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!empty($this->photo)) {
                    return asset('storage/' . $this->photo);
                }
                return asset('assets/img/person/default-profile.jpg');
            }
        );
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
