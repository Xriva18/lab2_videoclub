<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeliculaResource\Pages;
use App\Filament\Resources\PeliculaResource\RelationManagers;
use App\Models\Pelicula;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeliculaResource extends Resource
{
    protected static ?string $model = Pelicula::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('gen_id')
                    ->label('Género:')
                    ->relationship('genero', 'gen_nombre')
                    ->required(),
                Forms\Components\Select::make('dir_id')
                    ->label('Director:')
                    ->relationship('director', 'dir_nombre')
                    ->required(),
                Forms\Components\Select::make('for_id')
                    ->label('Formato:')
                    ->relationship('formato', 'for_nombre')
                    ->required(),
                Forms\Components\TextInput::make('pel_nombre')
                    ->label('Nombre pelicula:')
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('pel_costo')
                    ->label('Costo:')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('pel_fec_estreno')
                    ->label('Fecha de Estreno:')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('genero.gen_nombre')
                    ->label('Género')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('director.dir_nombre')
                    ->label('Director')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('formato.for_nombre')
                    ->label('Formato')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pel_nombre')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pel_costo')
                    ->label('Costo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pel_fec_estreno')
                    ->label('Fecha de Estreno')
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
            'index' => Pages\ListPeliculas::route('/'),
            'create' => Pages\CreatePelicula::route('/create'),
            'view' => Pages\ViewPelicula::route('/{record}'),
            'edit' => Pages\EditPelicula::route('/{record}/edit'),
        ];
    }
}
