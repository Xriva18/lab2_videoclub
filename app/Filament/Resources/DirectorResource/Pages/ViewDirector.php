<?php

namespace App\Filament\Resources\DirectorResource\Pages;

use App\Filament\Resources\DirectorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDirector extends ViewRecord
{
    protected static string $resource = DirectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
