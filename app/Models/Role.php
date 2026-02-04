<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'permissions',
        'is_active',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get the users that have this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user')
                    ->withTimestamps();
    }

    /**
     * Check if role has a specific permission
     */
    public function hasPermission(string $permission): bool
    {
        if (!$this->permissions) {
            return false;
        }

        return in_array($permission, $this->permissions);
    }

    /**
     * Get all available menu permissions
     */
    public static function getAvailablePermissions(): array
    {
        return [
            'dashboard' => 'Dashboard',
            'users' => 'User Management',
            'roles' => 'Role Management',
            'doctors' => 'Doctors',
            'schedules' => 'Schedules',
            'polyclinics' => 'Polyclinics / Units',
            'posts' => 'Posts & Articles',
            'services' => 'Services',
            'sliders' => 'Sliders',
            'abouts' => 'About Us',
            'menus' => 'Navigation Menus',
            'pages' => 'Static Pages',
            'global_settings' => 'Global Settings',
        ];
    }
}
