<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationBookedLogsResource\Pages;
use App\Filament\Resources\VaccinationBookedLogsResource\RelationManagers;
use App\Models\VaccinationBookedLogs;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VaccinationBookedLogsResource extends Resource
{
    protected static ?string $model = VaccinationBookedLogs::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
            'index' => Pages\ListVaccinationBookedLogs::route('/'),
            'create' => Pages\CreateVaccinationBookedLogs::route('/create'),
            'view' => Pages\ViewVaccinationBookedLogs::route('/{record}'),
            'edit' => Pages\EditVaccinationBookedLogs::route('/{record}/edit'),
        ];
    }    
}
