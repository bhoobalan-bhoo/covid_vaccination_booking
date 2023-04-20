<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationBookedLogsResource\Pages;
use App\Filament\Resources\VaccinationBookedLogsResource\RelationManagers;
use App\Models\AvailableTimings;
use App\Models\VaccinationBookedLogs;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class VaccinationBookedLogsResource extends Resource
{
    protected static ?string $model = VaccinationBookedLogs::class;
    protected static ?string $label = 'Book Vaccination';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'User Panel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('user_id')
                ->label('User Name')
                ->default(auth()->user()->id)
                ->relationship('user', 'name', fn (Builder $query) => $query)
                ->required()
                ->disabled()
                ->inlineLabel()
                ->columnSpan(2),

            Select::make('vaccination_centre_id')
                ->label('Vaccination Centre')
                ->relationship('vaccination_centre', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                ->required()
                ->inlineLabel()
                ->columnSpan(2),

            Select::make('available_timings_id')
                ->label('Available Timing')
                ->options(VaccinationBookedLogs::available_timings())
                ->required()
                ->inlineLabel()
                ->columnSpan(2),

            Select::make('slot_id')
                ->label('Slot Available')
                ->relationship('slot', 'count', fn (Builder $query) => $query->where('status', '=', 1))
                ->required()
                ->inlineLabel()
                ->columnSpan(2),

            Select::make('slot.date_alloted')
                ->label('Date Alloted')
                ->searchable()
                ->disabled()
                ->inlineLabel()
                ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label('Vaccination Centre')
                ->toggleable()
                ->searchable(),

                TextColumn::make('vaccination_centre.name')
                ->label('Vaccination Centre')
                ->toggleable()
                ->searchable(),

                TextColumn::make('slot.date_alloted')
                ->label('Date Alloted')
                ->searchable()
                ->toggleable(),

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
