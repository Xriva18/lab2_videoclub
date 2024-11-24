<?php

namespace App\Filament\Resources\PapelResource\Pages;

use App\Filament\Resources\PapelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPapel extends ViewRecord
{
    protected static string $resource = PapelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
