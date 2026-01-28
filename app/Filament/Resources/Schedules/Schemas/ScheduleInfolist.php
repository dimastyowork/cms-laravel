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
                    ->label('Dokter')
                    ->icon('heroicon-m-user')
                    ->iconColor('primary')
                    ->weight('bold'),
                    
                TextEntry::make('unit.name')
                    ->label('Unit/Poliklinik')
                    ->icon('heroicon-m-building-office-2')
                    ->badge()
                    ->color('info'),
                    
                TextEntry::make('time_slots')
                    ->label('Jadwal Praktik')
                    ->getStateUsing(function ($record) {
                        $state = $record->time_slots;
                        
                        if (!is_array($state) || empty($state)) {
                            return ['-'];
                        }
                        
                        // Mapping hari ke Bahasa Indonesia
                        $daysMap = [
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu',
                            'Sunday' => 'Minggu',
                        ];
                        
                        return collect($state)
                            ->map(function ($item) use ($daysMap) {
                                $dayKey = $item['day'] ?? '';
                                $dayName = $daysMap[$dayKey] ?? $dayKey;
                                
                                $times = collect($item['slots'] ?? [])
                                    ->map(function($slot) {
                                        try {
                                            $start = \Carbon\Carbon::parse($slot['start'])->format('H:i');
                                            $end = \Carbon\Carbon::parse($slot['end'])->format('H:i');
                                            return "{$start} - {$end}";
                                        } catch (\Exception $e) {
                                            return null;
                                        }
                                    })
                                    ->filter()
                                    ->join(', ');
                                    
                                return "{$dayName}: {$times}";
                            })
                            ->filter()
                            ->values()
                            ->toArray();
                    })
                    ->listWithLineBreaks()
                    ->bulleted(),
                    
                TextEntry::make('note')
                    ->label('Catatan')
                    ->icon('heroicon-m-information-circle')
                    ->iconColor('warning')
                    ->placeholder('Tidak ada catatan'),
            ]);
    }
}
