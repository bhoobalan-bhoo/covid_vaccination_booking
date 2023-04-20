<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationCentreResource\Pages;
use App\Filament\Resources\VaccinationCentreResource\RelationManagers;
use App\Models\VaccinationCentre;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class VaccinationCentreResource extends Resource
{
    protected static ?string $model = VaccinationCentre::class;

    protected static ?string $label = 'Vaccination Centre\'s';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'Centralize Control';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name of Centre')
                    ->required()
                    ->inlineLabel()
                    ->columnSpan(2),

                TextInput::make('code')
                    ->label('Centre Code')
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Centre Name')
                ->toggleable()
                ->searchable(),

                TextColumn::make('code')
                ->label('Centre Code')
                ->searchable()
                ->toggleable(),

                BooleanColumn::make('status')
                ->label('Status'),
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
            'index' => Pages\ListVaccinationCentres::route('/'),
            'create' => Pages\CreateVaccinationCentre::route('/create'),
            'view' => Pages\ViewVaccinationCentre::route('/{record}'),
            'edit' => Pages\EditVaccinationCentre::route('/{record}/edit'),
        ];
    }
}
