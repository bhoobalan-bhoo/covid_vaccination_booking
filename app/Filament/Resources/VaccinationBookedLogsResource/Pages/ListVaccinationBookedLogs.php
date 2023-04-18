<?php

namespace App\Filament\Resources\VaccinationBookedLogsResource\Pages;

use App\Filament\Resources\VaccinationBookedLogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaccinationBookedLogs extends ListRecords
{
    protected static string $resource = VaccinationBookedLogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
