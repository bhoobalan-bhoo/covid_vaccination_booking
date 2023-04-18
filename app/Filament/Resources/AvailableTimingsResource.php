<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailableTimingsResource\Pages;
use App\Filament\Resources\AvailableTimingsResource\RelationManagers;
use App\Models\AvailableTimings;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AvailableTimingsResource extends Resource
{
    protected static ?string $model = AvailableTimings::class;

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
            'index' => Pages\ListAvailableTimings::route('/'),
            'create' => Pages\CreateAvailableTimings::route('/create'),
            'view' => Pages\ViewAvailableTimings::route('/{record}'),
            'edit' => Pages\EditAvailableTimings::route('/{record}/edit'),
        ];
    }    
}
