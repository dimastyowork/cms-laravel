<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Role;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Information')
                    ->description('Basic user account information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->columnSpan(1),
                        
                        DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->columnSpan(1),

                        FileUpload::make('photo')
                            ->label('Profile Photo')
                            ->image()
                            ->avatar()
                            ->directory('users-photos')
                            ->visibility('public')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Password')
                    ->description('Set user password (leave blank to keep current password when editing)')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->columnSpan(1),
                        
                        TextInput::make('password_confirmation')
                            ->label('Confirm Password')
                            ->password()
                            ->same('password')
                            ->dehydrated(false)
                            ->required(fn (string $context): bool => $context === 'create')
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Role Assignment')
                    ->description('Assign roles to control user access permissions')
                    ->schema([
                        Select::make('roles')
                            ->label('Roles')
                            ->relationship(
                                name: 'roles',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn ($query) => $query->where('is_active', true)
                            )
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->helperText('Select one or more roles for this user')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
