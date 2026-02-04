<?php

namespace App\Traits;

trait HasResourcePermission
{
    public static function canViewAny(): bool
    {
        $permission = static::getResourcePermission();
        
        if (!$permission) {
            return true;
        }

        return auth()->user()?->hasPermission($permission) ?? false;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return static::canViewAny();
    }

    protected static function getResourcePermission(): ?string
    {
        return static::$resourcePermission ?? null;
    }
}
