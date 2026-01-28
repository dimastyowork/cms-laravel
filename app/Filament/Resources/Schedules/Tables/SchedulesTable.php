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
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-m-user')
                    ->iconColor('primary'),
                    
                TextColumn::make('unit.name')
                    ->label('Unit/Poliklinik')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-m-building-office-2'),
                    
                TextColumn::make('time_slots')
                    ->label('Jadwal Praktik')
                    ->getStateUsing(function ($record) {
                        $state = $record->time_slots;
                        
                        if (!is_array($state) || empty($state)) {
                            return ['-'];
                        }
                        
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
                                            return "{$start}-{$end}";
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
                    ->bulleted()
                    ->limitList(5)
                    ->expandableLimitedList(),
                    
                TextColumn::make('note')
                    ->label('Catatan')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->icon('heroicon-m-information-circle')
                    ->iconColor('warning')
                    ->toggleable(),
                    
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('doctor_id')
                    ->label('Dokter')
                    ->relationship('doctor', 'name')
                    ->searchable()
                    ->preload(),
                    
                \Filament\Tables\Filters\SelectFilter::make('unit_id')
                    ->label('Unit/Poliklinik')
                    ->relationship('unit', 'name')
                    ->searchable()
                    ->preload(),
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
            ])
            ->defaultSort('doctor.name', 'asc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }
}
