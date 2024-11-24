<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocioResource\Pages;
use App\Filament\Resources\SocioResource\RelationManagers;
use App\Models\Socio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocioResource extends Resource
{
    protected static ?string $model = Socio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('soc_cedula')
                    ->label('Cédula:')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('soc_nombre')
                    ->label('Nombre:')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('soc_direcion')
                    ->label('Dirección:')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('soc_telefono')
                    ->label('Teléfono:')
                    ->tel()
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('soc_correo')
                    ->label('Correo:')
                    ->required()
                    ->maxLength(60),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('soc_cedula')
                    ->searchable(),
                Tables\Columns\TextColumn::make('soc_nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('soc_direcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('soc_telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('soc_correo')
                    ->searchable(),
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
            'index' => Pages\ListSocios::route('/'),
            'create' => Pages\CreateSocio::route('/create'),
            'view' => Pages\ViewSocio::route('/{record}'),
            'edit' => Pages\EditSocio::route('/{record}/edit'),
        ];
    }
}
