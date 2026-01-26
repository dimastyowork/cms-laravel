<?php

namespace App\Filament\Resources\Schedules\Pages;

use App\Filament\Resources\Schedules\ScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extract days from time_slots repeater
        $days = collect($data['time_slots'] ?? [])
            ->pluck('day')
            ->unique()
            ->values()
            ->toArray();
            
        $data['days'] = $days;
        
        return $data;
    }
}
