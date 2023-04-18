<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlotsResource\Pages;
use App\Filament\Resources\SlotsResource\RelationManagers;
use App\Models\Slots;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlotsResource extends Resource
{
    protected static ?string $model = Slots::class;

    protected static ?string $label = 'Slots ';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Centralize Control';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSlots::route('/'),
            'create' => Pages\CreateSlots::route('/create'),
            'view' => Pages\ViewSlots::route('/{record}'),
            'edit' => Pages\EditSlots::route('/{record}/edit'),
        ];
    }
}
