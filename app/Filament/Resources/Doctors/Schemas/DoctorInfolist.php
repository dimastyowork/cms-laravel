<?php

namespace App\Filament\Resources\Doctors\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DoctorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('photo')
                    ->disk('public')
                    ->circular()
                    ->size(150),
                TextEntry::make('name'),
                TextEntry::make('specialization'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'busy' => 'warning',
                        'offline' => 'danger',
                    }),
                TextEntry::make('experience_years')
                    ->suffix(' years'),
                TextEntry::make('rating')
                    ->numeric(decimalPlaces: 1),
                TextEntry::make('reviews_count'),
            ]);
    }
}
