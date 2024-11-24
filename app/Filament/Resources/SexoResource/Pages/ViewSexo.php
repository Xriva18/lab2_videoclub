<?php

namespace App\Filament\Resources\SexoResource\Pages;

use App\Filament\Resources\SexoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSexo extends ViewRecord
{
    protected static string $resource = SexoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
