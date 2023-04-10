<?php

namespace App\Filament\Widgets;

use App\Models\Pemohon;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\Type\Integer;

class Pemohons extends BaseWidget
{
    protected static ?int $navigationSort = 3;
    protected int | string | array $columnSpan='full';
    protected function getTableQuery(): Builder
    {
        return Pemohon::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_tiket')->searchable()->sortable()->label('No Tiket'),
            Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('no_hp')->searchable(),
            Tables\Columns\TextColumn::make('usia'),
            Tables\Columns\BadgeColumn::make('jenis_layanan')->searchable()
                ->enum([
                'oss' => 'Layanan OSS',
                'lkpm' => 'Layanan LKPM',
                'izin' => 'Layanan Perizinan',
                'pengaduan' => 'Layanan Pengaduan dan Informasi'
            ])->colors([
                'danger' => 'oss',
                'warning' => 'lkpm',
                'success' => 'izin',
                'secondary' => 'pengaduan',
            ]),
            Tables\Columns\TextColumn::make('review_star')->wrap()->searchable(),
            // Tables\Columns\TextColumn::make('review_avg')->avg('pemohons', 'review_star'),
            Tables\Columns\TextColumn::make('review')->wrap()->sortable(),

            // ])
            // ->filters([
            //     SelectFilter::make('jenis_layanan')
            //     ->options([
            //     'oss' => 'Layanan OSS',
            //     'lkpm' => 'Layanan LKPM',
            //     'izin' => 'Layanan Perizinan',
            //     'pengaduan' => 'Layanan Pengaduan dan Informasi'
            //     ])
            // ])
            // ->actions([
            //     Tables\Actions\EditAction::make()->iconButton(),
            //     Tables\Actions\DeleteAction::make()->iconButton()
            //     ->requiresConfirmation()
            //     ->modalHeading('Hapus Pemohon')
            //     ->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')
            //     ->modalButton('Yes, delete them'),
            // ])
            // ->headerActions([
            //     FilamentExportHeaderAction::make('export')
            // ])
            // ->bulkActions([
            //     Tables\Actions\DeleteBulkAction::make(),
            //     // BulkAction::make('delete')
            //     // ->action(fn (Collection $records) => $records->each->delete())
            //     // ->deselectRecordsAfterCompletion()
            //     // ->requiresConfirmation()
            //     // ->modalHeading('Hapus Pemohon')
            //     // ->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')
            //     // ->modalButton('Yes, delete them'),
            //     FilamentExportBulkAction::make('export')
            // ]);
        ];
    }
}
