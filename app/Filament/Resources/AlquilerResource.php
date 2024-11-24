<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlquilerResource\Pages;
use App\Filament\Resources\AlquilerResource\RelationManagers;
use App\Models\Alquiler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlquilerResource extends Resource
{
    protected static ?string $model = Alquiler::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('soc_id')
                    ->label('Socio:')
                    ->relationship('socio', 'soc_nombre')
                    ->required(),
                Forms\Components\Select::make('pel_id')
                    ->label('Película:')
                    ->relationship('pelicula', 'pel_nombre')
                    ->required(),
                Forms\Components\DatePicker::make('alq_fec_desde')
                    ->label('Fecha Desde:')
                    ->required(),
                Forms\Components\DatePicker::make('alq_fec_hasta')
                    ->label('Fecha Hasta:')
                    ->required(),
                Forms\Components\TextInput::make('alq_valor')
                    ->label('Valor:')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('alq_fec_entrega')
                    ->label('Fecha Entrega:')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('socio.soc_nombre')
                    ->label('Socio')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pelicula.pel_nombre')
                    ->label('Película')
                    ->sortable(),
                Tables\Columns\TextColumn::make('alq_fec_desde')
                    ->label('Fecha Desde')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alq_fec_hasta')
                    ->label('Fecha Hasta')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alq_valor')
                    ->label('Valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alq_fec_entrega')
                    ->label('Fecha Entrega')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAlquilers::route('/'),
            'create' => Pages\CreateAlquiler::route('/create'),
            'view' => Pages\ViewAlquiler::route('/{record}'),
            'edit' => Pages\EditAlquiler::route('/{record}/edit'),
        ];
    }
}
