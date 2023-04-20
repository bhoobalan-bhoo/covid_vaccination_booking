<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlotsResource\Pages;
use App\Filament\Resources\SlotsResource\RelationManagers;
use App\Models\Slots;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


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

                Select::make('vaccination_centre_id')
                ->label('Vaccination Centre')
                ->relationship('vaccination_centre', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                ->required()
                ->inlineLabel()
                ->columnSpan(2),


            DatePicker::make('date_alloted')
                ->label('Date')
                ->required()
                ->inlineLabel()
                ->columnSpan(2)
                ->default(now())
                ->minDate(now(-1))->withoutTime(true)
                ->inlineLabel(),

            TextInput::make('count')
                ->label('No. of Slots')
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
                ->toggleable()
                ->searchable(),

                TextColumn::make('date_alloted')
                ->label('Date Alloted')
                ->searchable()
                ->toggleable(),

                TextColumn::make('count')
                ->label('Slots Available')
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
            'index' => Pages\ListSlots::route('/'),
            'create' => Pages\CreateSlots::route('/create'),
            'view' => Pages\ViewSlots::route('/{record}'),
            'edit' => Pages\EditSlots::route('/{record}/edit'),
        ];
    }
}
