<?php

namespace App\Filament\Resources\VaccinationCentreResource\Pages;

use App\Filament\Resources\VaccinationCentreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaccinationCentres extends ListRecords
{
    protected static string $resource = VaccinationCentreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
