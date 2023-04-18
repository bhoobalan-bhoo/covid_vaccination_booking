<?php

namespace App\Filament\Resources\SlotsResource\Pages;

use App\Filament\Resources\SlotsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlots extends EditRecord
{
    protected static string $resource = SlotsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
