<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    ];

    /**
     * Get the doctor's photo with default profile image fallback
     */
    protected function casts(): array
    {
        return [
            'photo' => 'string',
        ];
    }

    /**
     * Get the photo URL with default fallback
     */
    public function getPhotoUrlAttribute(): string
    {
        // Jika ada foto di database, gunakan itu
        if (!empty($this->photo)) {
            return asset('storage/' . $this->photo);
        }
        // Jika tidak ada, gunakan default image
        return asset('assets/img/person/default-profile.jpg');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
