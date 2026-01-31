<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\StaticPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = StaticPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
