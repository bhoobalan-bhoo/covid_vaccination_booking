<?php

namespace App\Filament\Resources\SlotsResource\Pages;

use App\Filament\Resources\SlotsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSlots extends ViewRecord
{
    protected static string $resource = SlotsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
