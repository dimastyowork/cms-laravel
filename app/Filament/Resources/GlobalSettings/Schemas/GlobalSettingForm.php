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
                    ->image()
                    ->directory('logos')
                    ->nullable(),
                TextInput::make('url')
                    ->label('Website URL')
                    ->url()
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
                TextInput::make('footer_url')
                    ->label('Footer URL')
                    ->url()
                    ->nullable(),
                TextInput::make('footer_link_text')
                    ->label('Footer Link Text')
                    ->nullable(),
                TextInput::make('footer_link_url')
                    ->label('Footer Link URL')
                    ->url()
                    ->nullable(),
            ]);
    }
}
