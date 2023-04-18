<?php

namespace App\Filament\Resources\SlotsResource\Pages;

use App\Filament\Resources\SlotsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlots extends ListRecords
{
    protected static string $resource = SlotsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
