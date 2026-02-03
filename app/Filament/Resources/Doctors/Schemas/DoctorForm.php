<?php

namespace App\Filament\Resources\Doctors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DoctorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Profil')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('specialization')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Textarea::make('bio')
                            ->columnSpanFull(),
                        FileUpload::make('photo')
                            ->columnSpanFull()
                            ->disk('public')
                            ->image()
                            ->directory('doctors'),
                    ])
                    ->columnSpanFull(),

                Section::make('Pengaturan & Status')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'available' => 'Available',
                                        'busy' => 'Busy',
                                        'offline' => 'Offline',
                                    ])
                                    ->required()
                                    ->default('available'),
                                TextInput::make('sort_order')
                                    ->label('Urutan Tampil')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('is_active')
                                    ->label('Status Aktif')
                                    ->inline(false)
                                    ->default(true),
                            ]),
                        Grid::make(3)
                            ->schema([
                                TextInput::make('experience_years')
                                    ->label('Pengalaman (Tahun)')
                                    ->numeric()
                                    ->default(0),
                                TextInput::make('rating')
                                    ->numeric()
                                    ->default(5.0),
                                TextInput::make('reviews_count')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
