<?php

namespace App\Filament\Resources\GlobalSettings\Pages;

use App\Filament\Resources\GlobalSettings\GlobalSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGlobalSettings extends ListRecords
{
    protected static string $resource = GlobalSettingResource::class;

    public function mount(): void
    {
        $setting = \App\Models\GlobalSetting::first();

        if (! $setting) {
            $setting = \App\Models\GlobalSetting::create([
                'logo' => null,
            ]);
        }

        redirect(GlobalSettingResource::getUrl('edit', ['record' => $setting]));
    }
}
