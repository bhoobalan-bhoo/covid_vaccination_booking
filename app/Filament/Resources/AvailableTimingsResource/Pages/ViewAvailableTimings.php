<?php

namespace App\Filament\Resources\AvailableTimingsResource\Pages;

use App\Filament\Resources\AvailableTimingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAvailableTimings extends ViewRecord
{
    protected static string $resource = AvailableTimingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
