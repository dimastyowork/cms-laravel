<?php

namespace App\Filament\Resources\Doctors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DoctorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('specialization')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'busy' => 'Busy',
                        'offline' => 'Offline',
                    ])
                    ->required()
                    ->default('available'),
                TextInput::make('experience_years')
                    ->numeric()
                    ->default(0),
                TextInput::make('rating')
                    ->numeric()
                    ->default(5.0),
                TextInput::make('reviews_count')
                    ->numeric()
                    ->default(0),
                Textarea::make('bio')
                    ->columnSpanFull(),
                FileUpload::make('photo')
                    ->disk('public')
                    ->image()
                    ->directory('doctors'),
            ]);
    }
}
