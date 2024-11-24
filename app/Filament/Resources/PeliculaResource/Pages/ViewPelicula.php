<?php

namespace App\Filament\Resources\PeliculaResource\Pages;

use App\Filament\Resources\PeliculaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPelicula extends ViewRecord
{
    protected static string $resource = PeliculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
