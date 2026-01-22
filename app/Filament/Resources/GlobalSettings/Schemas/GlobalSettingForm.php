<?php

namespace App\Filament\Resources\GlobalSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GlobalSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->directory('logos')
                    ->nullable(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable(),
                TextInput::make('phone')
                    ->label('Phone')
                    ->tel()
                    ->nullable(),
                TextInput::make('address')
                    ->label('Address')
                    ->nullable(),
                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->nullable(),
                TextInput::make('facebook')
                    ->label('Facebook URL')
                    ->url()
                    ->nullable(),
                TextInput::make('twitter')
                    ->label('Twitter URL')
                    ->url()
                    ->nullable(),
                TextInput::make('instagram')
                    ->label('Instagram URL')
                    ->url()
                    ->nullable(),
                \Filament\Forms\Components\Repeater::make('footer_columns')
                    ->label('Footer Columns')
                    ->schema([
                        TextInput::make('title')->required(),
                        \Filament\Forms\Components\Repeater::make('links')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('url')->required(),
                            ])
                    ])
                    ->columnSpanFull(),
                TextInput::make('copyright_text')
                    ->label('Copyright Text')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
