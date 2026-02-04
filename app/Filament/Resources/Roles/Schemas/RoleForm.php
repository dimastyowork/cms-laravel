<?php

namespace App\Filament\Resources\Roles\Schemas;

use App\Models\Role;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Role Information')
                    ->description('Basic information about the role')
                    ->schema([
                        TextInput::make('name')
                            ->label('Role Name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->columnSpan(1),
                        
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from role name')
                            ->columnSpan(1),
                        
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull(),
                        
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive roles cannot be assigned to users')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Section::make('Menu Permissions')
                    ->description('Select which menus/resources this role can access')
                    ->schema([
                        CheckboxList::make('permissions')
                            ->label('Access Permissions')
                            ->options(Role::getAvailablePermissions())
                            ->columns(2)
                            ->gridDirection('row')
                            ->bulkToggleable()
                            ->helperText('Select all menus that users with this role can access'),
                    ]),
            ]);
    }
}
