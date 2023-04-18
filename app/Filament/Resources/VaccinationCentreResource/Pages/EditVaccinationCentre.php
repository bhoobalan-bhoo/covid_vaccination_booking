<?php

namespace App\Filament\Resources\VaccinationCentreResource\Pages;

use App\Filament\Resources\VaccinationCentreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaccinationCentre extends EditRecord
{
    protected static string $resource = VaccinationCentreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
