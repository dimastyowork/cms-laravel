<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;

class ScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('doctor.name')
                    ->label('Dokter'),
                TextEntry::make('unit.name')
                    ->label('Unit'),
                TextEntry::make('days')
                    ->label('Hari Praktik')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'Monday' => 'Senin',
                        'Tuesday' => 'Selasa',
                        'Wednesday' => 'Rabu',
                        'Thursday' => 'Kamis',
                        'Friday' => 'Jumat',
                        'Saturday' => 'Sabtu',
                        'Sunday' => 'Minggu',
                        default => $state,
                    })
                    ->separator(','),
                RepeatableEntry::make('time_slots')
                    ->label('Jam Praktik')
                    ->schema([
                        TextEntry::make('start')
                            ->label('Buka'),
                        TextEntry::make('end')
                            ->label('Tutup'),
                    ])
                    ->columns(2),
                TextEntry::make('note')
                    ->label('Catatan'),
            ]);
    }
}
