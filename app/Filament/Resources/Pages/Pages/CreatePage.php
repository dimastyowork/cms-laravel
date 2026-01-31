<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\StaticPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = StaticPageResource::class;
}
