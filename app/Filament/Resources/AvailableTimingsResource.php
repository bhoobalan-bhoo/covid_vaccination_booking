<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AvailableTimingsResource\Pages;
use App\Filament\Resources\AvailableTimingsResource\RelationManagers;
use App\Models\AvailableTimings;
use App\Models\VaccinationCentre;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;


class AvailableTimingsResource extends Resource
{
    protected static ?string $model = AvailableTimings::class;

    protected static ?string $label = 'Available Timings over Centre';

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Centralize Control';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vaccination_centre_id')
                    ->label('vaccination Centre')
                    ->relationship('vaccination_centre', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                    ->required()
                    ->inlineLabel()
                    ->columnSpan(2)
                    ->searchable(),

                TimePicker::make('from_time')
                    ->label('From Time')
                    ->placeholder('From Time')
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel(),


                TimePicker::make('to_time')
                    ->label('To Time')
                    ->placeholder('To Time')
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vaccination_centre.name')
                    ->label('Vaccination Centre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('from_time')
                    ->label('From Time')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('to_time')
                    ->label('To Time')
                    ->searchable()
                    ->sortable(),


                BooleanColumn::make('status')
                    ->label('Status'),

                TextColumn::make('created_by')
                    ->label('Created By')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
