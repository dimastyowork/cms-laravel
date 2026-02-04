<?php

namespace App\Filament\Resources\GlobalSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;

class GlobalSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Branding')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->disk('public')
                            ->image()
                            ->directory('logos')
                            ->imagePreviewHeight('150')
                            ->columnSpanFull(),
                    ]),

                Section::make('Kontak')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('email')
                                ->email(),

                            TextInput::make('phone')
                                ->label('Nomor Telepon Rumah Sakit')
                                ->tel(),

                            TextInput::make('emergency_phone')
                                ->label('Nomor Telepon Darurat (IGD)')
                                ->tel(),

                            TextInput::make('address')
                                ->columnSpanFull(),
                        ]),
                    ]),

                Section::make('Deskripsi Website')
                    ->schema([
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Sosial Media')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('facebook')->url(),
                            TextInput::make('twitter')->url(),
                            TextInput::make('instagram')->url(),
                            TextInput::make('whatsapp')->tel()->label('WhatsApp'),
                            TextInput::make('youtube')->url()->label('YouTube'),
                            TextInput::make('tiktok')->url()->label('TikTok'),
                        ]),
                    ]),

                Section::make('Footer Website')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('footer_columns')
                            ->label('Kolom Footer')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Kolom')
                                    ->required(),

                                Repeater::make('links')
                                    ->schema([
                                        TextInput::make('label')->required(),
                                        TextInput::make('url')->required(),
                                    ])
                                    ->columns(2)
                                    ->addActionLabel('Tambah Link'),
                            ])
                            ->columnSpanFull()
                            ->addActionLabel('Tambah Kolom'),

                        TextInput::make('copyright_text')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
