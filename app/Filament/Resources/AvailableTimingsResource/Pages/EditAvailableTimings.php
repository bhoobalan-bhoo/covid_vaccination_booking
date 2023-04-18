<?php

namespace App\Filament\Resources\AvailableTimingsResource\Pages;

use App\Filament\Resources\AvailableTimingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvailableTimings extends EditRecord
{
    protected static string $resource = AvailableTimingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
