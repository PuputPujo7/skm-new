<?php

namespace App\Filament\Resources\PemohonResource\Pages;

use App\Filament\Resources\PemohonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemohons extends ListRecords
{
    protected static string $resource = PemohonResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),

        ];
    }
    protected function getHeaderWidgets(): array
    {
    return [
    PemohonResource\Widgets\PemohonOverview::class,
    ];
    }
}
