<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use App\Models\Page;
use App\Models\Post;
use App\Models\Unit;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('category')
                    ->options([
                        'Pelayanan Medis' => 'Pelayanan Medis',
                        'Pelayanan Klinik' => 'Pelayanan Klinik',
                        'Pelayanan Perawatan' => 'Pelayanan Perawatan',
                        'Pelayanan Penunjang Medis' => 'Pelayanan Penunjang Medis',
                        'Homecare' => 'Homecare',
                    ])
                    ->required()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('category')
                            ->required()
                    ])
                    ->native(false),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                Grid::make(2)
                    ->schema([
                        Select::make('link')
                            ->options(function () {
                                $pages = Page::all()->toBase()->mapWithKeys(fn ($page) => ["/page/{$page->slug}" => "Halaman: {$page->title}"]);
                                $posts = Post::all()->toBase()->mapWithKeys(fn ($post) => ["/berita/{$post->slug}" => "Berita/Artikel: {$post->title}"]);
                                $units = Unit::all()->toBase()->mapWithKeys(fn ($unit) => ["/poliklinik/{$unit->slug}" => "Poliklinik: {$unit->name}"]);
                                return $pages->merge($posts)->merge($units)->toArray();
                            })
                            ->searchable()
                            ->placeholder('Pilih halaman atau poliklinik'),
                        TextInput::make('sort_order')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),
                FileUpload::make('image')
                    ->image()
                    ->directory('services'),
                Toggle::make('is_featured')
                    ->label('Tampilkan sebagai layanan unggulan')
                    ->inline(false)
                    ->required(),
            ]);
    }
}
