<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(table: 'posts', column: 'slug', ignoreRecord: true),
                Select::make('category')
                    ->options(fn () => \App\Models\PostCategory::pluck('name', 'slug')->toArray())
                    ->searchable()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        TextInput::make('slug')
                            ->required(), // Hilangkan all automatic validation di sini untuk stop error SQL
                    ])
                    ->createOptionUsing(function (array $data): string {
                        // Cek manual di sini. Jika ada duplikat, tampilkan pesan error yang ramah.
                        $existing = \App\Models\PostCategory::where('slug', $data['slug'])->first();
                        if ($existing) {
                            throw \Illuminate\Validation\ValidationException::withMessages([
                                'name' => 'Kategori ini sudah ada di sistem.',
                                'slug' => 'Kategori ini sudah ada di sistem.',
                            ]);
                        }
                        
                        return \App\Models\PostCategory::create($data)->slug;
                    }),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('posts/content')
                    ->fileAttachmentsVisibility('public'),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('posts'),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
