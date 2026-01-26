<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('doctor_id')
                    ->relationship('doctor', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('unit_id')
                    ->relationship('unit', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                \Filament\Forms\Components\Hidden::make('days'), // Will be populated by observer/hook
                
                \Filament\Forms\Components\Repeater::make('time_slots')
                    ->label('Jadwal Praktik')
                    ->schema([
                        Select::make('day')
                            ->label('Hari')
                            ->options([
                                'Monday' => 'Senin',
                                'Tuesday' => 'Selasa',
                                'Wednesday' => 'Rabu',
                                'Thursday' => 'Kamis',
                                'Friday' => 'Jumat',
                                'Saturday' => 'Sabtu',
                                'Sunday' => 'Minggu',
                            ])
                            ->required()
                            ->columnSpan(1),
                            
                        \Filament\Forms\Components\Repeater::make('slots')
                            ->label('Jam')
                            ->schema([
                                TimePicker::make('start')
                                    ->label('Buka')
                                    ->required()
                                    ->seconds(false),
                                TimePicker::make('end')
                                    ->label('Tutup')
                                    ->required()
                                    ->seconds(false),
                            ])
                            ->columns(2)
                            ->columnSpan(1)
                            ->addActionLabel('Tambah Jam')
                    ])
                    ->columns(2)
                    ->defaultItems(1)
                    ->addActionLabel('Tambah Hari Lain')
                    ->reorderableWithButtons(),
                    
                TextInput::make('note')
                    ->label('Catatan')
                    ->maxLength(255),
            ]);
    }
}
