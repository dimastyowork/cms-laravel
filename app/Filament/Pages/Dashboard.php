<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Traits\HasResourcePermission;

class Dashboard extends BaseDashboard
{
    use HasResourcePermission;

    protected static ?string $resourcePermission = 'dashboard';
}
