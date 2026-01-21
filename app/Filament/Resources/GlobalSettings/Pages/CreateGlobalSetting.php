<?php

namespace App\Filament\Resources\GlobalSettings\Pages;

use App\Filament\Resources\GlobalSettings\GlobalSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGlobalSetting extends CreateRecord
{
    protected static string $resource = GlobalSettingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
