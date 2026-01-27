<?php

namespace App\Filament\Resources\Schedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('doctor.name')
                    ->label('Dokter')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('unit.name')
                    ->label('Unit/Poliklinik')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('days')
                    ->label('Hari')
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
                    ->separator(',')
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan hari karena sudah ada di kolom jadwal detail
                    
                TextColumn::make('time_slots')
                    ->label('Jadwal Praktik')
                    ->formatStateUsing(function ($state) {
                        if (!is_array($state)) return '-';
                        
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
                                $day = $daysMap[$item['day'] ?? ''] ?? ($item['day'] ?? '-');
                                $times = collect($item['slots'] ?? [])
                                    ->map(fn($slot) => \Carbon\Carbon::parse($slot['start'])->format('H:i') . '-' . \Carbon\Carbon::parse($slot['end'])->format('H:i'))
                                    ->join(', ');
                                    
                                return "<strong>{$day}:</strong> {$times}";
                            })
                            ->join('<br>');
                    })
                    ->html()
                    ->wrap(),
                TextColumn::make('note')
                    ->label('Catatan')
                    ->limit(30)
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
