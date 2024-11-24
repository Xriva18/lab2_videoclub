<?php

namespace App\Filament\Resources\PapelResource\Pages;

use App\Filament\Resources\PapelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPapel extends EditRecord
{
    protected static string $resource = PapelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
