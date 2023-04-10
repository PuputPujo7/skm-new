<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapResource\Pages;
use App\Filament\Resources\RekapResource\RelationManagers;
use App\Models\Rekap;
use App\Models\Pemohon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use Filament\Tables\Columns\Layout\Grid;

class RekapResource extends Resource
{
    protected static ?string $model = Rekap::class;
    // protected static ?string $model = Rekap::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Rekap';

    protected static ?string $navigationLabel = 'Rekap Per Bulan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_tiket')->searchable()->sortable()->label('No Tiket'),
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('no_hp')->searchable(),
                TextColumn::make('usia'),
                TextColumn::make('pertanyaan.question'),
                TextColumn::make('created_at')
                    ->dateTime(),
                // TextColumn::make('updated_at')
                //     ->dateTime(),
                BadgeColumn::make('jenis_layanan')->searchable()
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
            TextColumn::make('review_star')->wrap()->searchable(),
            TextColumn::make('review')->wrap()->sortable(),

            ])
            ->filters([
                SelectFilter::make('jenis_layanan')
                ->options([
                'oss' => 'Layanan OSS',
                'lkpm' => 'Layanan LKPM',
                'izin' => 'Layanan Perizinan',
                'pengaduan' => 'Layanan Pengaduan dan Informasi'
                ])
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekaps::route('/'),
            // 'create' => Pages\CreateRekap::route('/create'),
            // 'edit' => Pages\EditRekap::route('/{record}/edit'),
        ];
    }    
}
