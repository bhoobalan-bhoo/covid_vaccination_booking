<?php

namespace App\Filament\Resources\VaccinationBookedLogsResource\Pages;

use App\Filament\Resources\VaccinationBookedLogsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaccinationBookedLogs extends EditRecord
{
    protected static string $resource = VaccinationBookedLogsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
