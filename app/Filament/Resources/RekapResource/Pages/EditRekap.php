<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekap extends EditRecord
{
    protected static string $resource = RekapResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
