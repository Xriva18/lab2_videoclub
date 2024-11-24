<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PapelResource\Pages;
use App\Filament\Resources\PapelResource\RelationManagers;
use App\Models\Papel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PapelResource extends Resource
{
    protected static ?string $model = Papel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('act_id')
                ->label('Actor:')    
                ->relationship('actor', 'act_nombre')
                ->required(),
                Forms\Components\Select::make('pel_id')
                ->label('Película:') 
                ->relationship('pelicula', 'pel_nombre')   
                ->required(),
                Forms\Components\TextInput::make('apl_papel')
                ->label('Papel del actor:')    
                ->required()
                    ->maxLength(60),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actor.act_nombre')
                    ->label('Actor')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pelicula.pel_nombre')
                    ->label('Película')
                    ->sortable(),
                Tables\Columns\TextColumn::make('apl_papel')
                ->label('Papel del actor')
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
            'index' => Pages\ListPapels::route('/'),
            'create' => Pages\CreatePapel::route('/create'),
            'view' => Pages\ViewPapel::route('/{record}'),
            'edit' => Pages\EditPapel::route('/{record}/edit'),
        ];
    }
}
