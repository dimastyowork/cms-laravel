<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\StaticPageResource;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = StaticPageResource::class;
}
