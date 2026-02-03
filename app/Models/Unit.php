<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'image',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get excerpt from description or content.
     *
     * @param int $limit
     * @return string
     */
    public function getExcerpt($limit = 100): string
    {
        if ($this->description) {
            return Str::limit($this->description, $limit);
        }

        if ($this->content) {
            return Str::limit(strip_tags($this->content), $limit);
        }

        return '';
    }

    /**
     * Get the image URL attribute.
     * Returns the image from storage if exists, otherwise returns default image.
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        
        return asset('assets/img/coming-soon.png');
    }
}
