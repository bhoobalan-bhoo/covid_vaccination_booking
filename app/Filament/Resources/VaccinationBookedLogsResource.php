<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationBookedLogsResource\Pages;
use App\Filament\Resources\VaccinationBookedLogsResource\RelationManagers;
use App\Models\AvailableTimings;
use App\Models\VaccinationBookedLogs;
use App\Models\VaccinationCentre;
use App\Models\Slots;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;

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
                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                    $vendor = VaccinationCentre::find($state);

                    if ($vendor) {
                        $aircraftId = (int) $get('available_timings_id');

                        if ($aircraftId && $aircraft = AvailableTimings::find($aircraftId)) {
                            if ($aircraft->vendor_id !== $vendor->id) {
                                // aircraft doesn't belong to vendor, so unselect it
                                $set('available_timings_id', null);
                            }
                        }
                    }
                })
                ->reactive()
                ->columnSpan(2),

            Select::make('available_timings_id')
                ->label('Available Timing')
                ->options(function (callable $get, callable $set) {
                    $vendor = VaccinationCentre::find($get('vaccination_centre_id'));
                    $available_timing = AvailableTimings::where('vaccination_centre_id', '=', $get('vaccination_centre_id'))->get();
                    $available_timing_options = [];
                    foreach ($available_timing as $a_time) {
                        $data =$a_time->from_time.' | '.$a_time->to_time;
                        $available_timing_options[$a_time->id] = strtoupper($data);

                    }

                    // no vendor selected, so get all aircraft
                    return $available_timing_options;
                })

                ->inlineLabel()
                ->columnSpan(2),

            Select::make('date_alloted')
                ->label('Available Date')
                ->required()
                ->inlineLabel()
                ->columnSpan(2)
                ->options(function (callable $get, callable $set) {
                    $vendor = VaccinationCentre::find($get('vaccination_centre_id'));
                    $available_timing = Slots::where('vaccination_centre_id', '=', $get('vaccination_centre_id'))->get();
                    $available_timing_options = [];
                    foreach ($available_timing as $a_time) {
                        $data =$a_time->date_alloted;
                        $available_timing_options[$a_time->id] = strtoupper($data);
                    }

                    // no vendor selected, so get all aircraft
                    return $available_timing_options;
                })

                ->reactive()
                ->inlineLabel(),
            Select::make('slot_id')
                ->label('Slot Available')
                ->options(function (callable $get, callable $set) {
                    $vendor = VaccinationCentre::find($get('vaccination_centre_id'));
                    $available_timing = Slots::where('id', '=', $get('date_alloted'))->get();
                    $available_timing_options = [];
                    foreach ($available_timing as $a_time) {
                        $data =$a_time->count;
                        if ($data <= 0)
                        {
                            continue;
                        }
                        $available_timing_options[$a_time->id] = strtoupper($data);
                    }
                    if (count($available_timing_options) === 0)
                    {
                        $available_timing_options =["No Slots Available"];
                    }
                    // no vendor selected, so get all aircraft
                    return $available_timing_options;
                })
                ->reactive()
                ->inlineLabel()
                ->columnSpan(2),





            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label('User Name')
                ->toggleable()
                ->searchable(),


                TextColumn::make('available_timings.from_time')
                ->label('From Time')
                ->toggleable()
                ->searchable(),
                TextColumn::make('available_timings.to_time')
                ->label('To Time')
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
