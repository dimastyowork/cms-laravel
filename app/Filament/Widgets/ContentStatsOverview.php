<?php

namespace App\Filament\Widgets;

use App\Models\About;
use App\Models\Doctor;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Service;
use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Dokter', Doctor::count())
                ->description('Dokter yang terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
            
            Stat::make('Total Poliklinik', Unit::count())
                ->description('Unit layanan aktif')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('info')
                ->chart([3, 2, 4, 3, 5, 4, 6, 5]),
            
            Stat::make('Total Layanan', Service::count())
                ->description('Layanan tersedia')
                ->descriptionIcon('heroicon-m-heart')
                ->color('warning')
                ->chart([2, 4, 3, 5, 4, 6, 5, 7]),
            
            Stat::make('Total Menu', Menu::count())
                ->description('Menu navigasi')
                ->descriptionIcon('heroicon-m-bars-3')
                ->color('primary')
                ->chart([1, 2, 1, 3, 2, 4, 3, 5]),
            
            Stat::make('Total Artikel', Post::count())
                ->description('Artikel yang dipublikasikan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('danger')
                ->chart([5, 6, 7, 8, 9, 10, 11, 12]),
            
            Stat::make('Slider Aktif', About::where('is_active', true)->count())
                ->description('Slider yang aktif')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success')
                ->chart([1, 1, 2, 2, 3, 3, 4, 4]),
        ];
    }
}
