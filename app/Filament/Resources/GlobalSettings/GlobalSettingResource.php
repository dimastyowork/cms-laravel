<?php

namespace App\Filament\Resources\GlobalSettings;

use App\Filament\Resources\GlobalSettings\Pages\CreateGlobalSetting;
use App\Filament\Resources\GlobalSettings\Pages\EditGlobalSetting;
use App\Filament\Resources\GlobalSettings\Pages\ListGlobalSettings;
use App\Filament\Resources\GlobalSettings\Schemas\GlobalSettingForm;
use App\Filament\Resources\GlobalSettings\Tables\GlobalSettingTable;
use App\Models\GlobalSetting;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GlobalSettingResource extends Resource
{
    protected static ?string $model = GlobalSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAdjustmentsHorizontal;

    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan';
    
    protected static ?string $navigationLabel = 'Pengaturan Global';

    protected static ?string $modelLabel = 'Global Setting';

    protected static ?string $pluralModelLabel = 'Pengaturan Global';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return GlobalSettingTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGlobalSettings::route('/'),
            'create' => CreateGlobalSetting::route('/create'),
            'edit' => EditGlobalSetting::route('/{record}/edit'),
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return GlobalSettingForm::configure($schema);
    }
}
