<?php

namespace App\Filament\Resources\AvailableTimingsResource\Pages;

use App\Filament\Resources\AvailableTimingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvailableTimings extends ListRecords
{
    protected static string $resource = AvailableTimingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
