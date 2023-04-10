<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekaps extends ListRecords
{
    protected static string $resource = RekapResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
    return [
    RekapResource\Widgets\RekapOverview::class,
    ];
    }
}
