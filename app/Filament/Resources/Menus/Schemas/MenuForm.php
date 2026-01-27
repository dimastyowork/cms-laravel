<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use App\Models\Menu;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                Select::make('parent_id')
                    ->label('Parent Menu')
                    ->options(Menu::where('parent_id', null)->pluck('title', 'id'))
                    ->searchable()
                    ->preload(),

                Select::make('post_id')
                    ->label('Link to Post/News')
                    ->relationship('post', 'title')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('url', null)),

                TextInput::make('url')
                    ->label('Custom URL')
                    ->placeholder('https://... or #')
                    ->disabled(fn (Get $get) => filled($get('post_id')))
                    ->dehydrated(fn (Get $get) => blank($get('post_id'))),

                TextInput::make('order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
