<?php

namespace App\Filament\Resources\PemohonResource\Pages;

use App\Filament\Resources\PemohonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemohon extends EditRecord
{
    protected static string $resource = PemohonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
