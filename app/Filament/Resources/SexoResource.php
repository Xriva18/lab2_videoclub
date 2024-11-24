<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SexoResource\Pages;
use App\Filament\Resources\SexoResource\RelationManagers;
use App\Models\Sexo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SexoResource extends Resource
{
    protected static ?string $model = Sexo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sex_nombre')
                ->label('Nombre del Sexo')
                ->required()
                ->maxLength(60), // Limita la longitud del texto
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sex_nombre')
                    ->label('Tipo de sexo')
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
            'index' => Pages\ListSexos::route('/'),
            'create' => Pages\CreateSexo::route('/create'),
            'view' => Pages\ViewSexo::route('/{record}'),
            'edit' => Pages\EditSexo::route('/{record}/edit'),
        ];
    }
}
