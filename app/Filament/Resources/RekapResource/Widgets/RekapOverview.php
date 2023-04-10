<?php

namespace App\Filament\Resources\RekapResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Pemohon;

class RekapOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Complaints', Pemohon::where('jenis_layanan', 'oss')->count())->label('Layanan OSS')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-s-trending-up')
            ->extraAttributes([
            'class' => 'cursor-pointer',
            'wire:click' => '$emitUp("setStatusFilter", "processed")',
            ])
            ->color('danger'),
            Card::make('Total Complaints', Pemohon::where('jenis_layanan', 'lkpm')->count())->label('Layanan LKPM')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-s-trending-up')
            ->extraAttributes([
            'class' => 'cursor-pointer',
            'wire:click' => '$emitUp("setStatusFilter", "processed")',
            ])
            ->color('warning'),
            Card::make('Total Complaints', Pemohon::where('jenis_layanan', 'izin')->count())->label('Layanan Perizinan')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-s-trending-up')
            ->extraAttributes([
            'class' => 'cursor-pointer',
            'wire:click' => '$emitUp("setStatusFilter", "processed")',
            ])
            ->color('success'),
            Card::make('Total Complaints', Pemohon::where('jenis_layanan', 'pengaduan')->count())->label('Layanan Pengaduan dan Informasi')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-s-trending-up')
            ->extraAttributes([
            'class' => 'cursor-pointer',
            'wire:click' => '$emitUp("setStatusFilter", "processed")',
            ])
            ->color('secondary'),
        ];
    }
}
