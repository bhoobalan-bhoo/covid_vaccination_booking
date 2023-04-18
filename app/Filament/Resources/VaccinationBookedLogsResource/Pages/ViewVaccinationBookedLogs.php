<?php

namespace App\Filament\Resources\VaccinationBookedLogsResource\Pages;

use App\Filament\Resources\VaccinationBookedLogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVaccinationBookedLogs extends ViewRecord
{
    protected static string $resource = VaccinationBookedLogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
