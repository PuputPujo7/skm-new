<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemohonResource\Pages;
use App\Filament\Resources\PemohonResource\RelationManagers;
use App\Models\Pemohon;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Position;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkAction;
use KoalaFacade\FilamentAlertBox\Forms\Components\AlertBox;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class PemohonResource extends Resource
{
    protected static ?string $model = Pemohon::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $navigationGroup = 'SKM';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'Data Pemohon';

    protected static ?string $pluralLabel = 'Data Pemohon';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()->schema([
                    TextInput::make('nama')->required(),
                    Textarea::make('alamat')->required(),
                    TextInput::make('no_hp')->numeric()->required(),
                    Radio::make('jenis_kelamin')->options([
                        'laki-laki' => 'Laki-Laki',
                        'perempuan' => 'Perempuan',
                        'null' => 'Tidak Disebutkan',
                    ]),
                    TextInput::make('usia'),
                    Grid::make([
                    Select::make('pendidikan')->options([
                        'sd' => 'SD',
                        'smp' => 'SMP',
                        'sma' => 'SMA',
                        'd1' => 'D1',
                        'd2' => 'D2',
                        'd3' => 'D3',
                        'd4' => 'D4',
                        's1' => 'S1',
                        's2' => 'S2',
                        's3' => 'S3',
                    ]),
                    Select::make('jenis_layanan')->options([
                    'oss' => 'Layanan OSS',
                    'lkpm' => 'Layanan LKPM',
                    'izin' => 'Layanan Perizinan',
                    'pengaduan' => 'Layanan Pengaduan dan Informasi'
                    ]),
                ])->columns(2),
                    Hidden::make('date')->default(Carbon::now()->format('M')),
                //    Hidden::make('no_tiket')->default(Carbon::now()->format('Ymd'))

                    ])
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
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton()
                ->requiresConfirmation()
                ->modalHeading('Hapus Pemohon')
                ->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')
                ->modalButton('Yes, delete them'),
            ])
            ->headerActions([
                FilamentExportHeaderAction::make('export')
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                // BulkAction::make('delete')
                // ->action(fn (Collection $records) => $records->each->delete())
                // ->deselectRecordsAfterCompletion()
                // ->requiresConfirmation()
                // ->modalHeading('Hapus Pemohon')
                // ->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')
                // ->modalButton('Yes, delete them'),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];

    }

    // public static function getWidgets(): array
    // {
    // return [
    //     PemohonResource\Widgets\PemohonOverview::class,

    // ];
    // }

    public static function getGloballySearchableAttributes(): array
    {
        return ['nama', 'no_tiket', 'jenis_layanan'];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemohons::route('/'),
            'create' => Pages\CreatePemohon::route('/create'),
            'edit' => Pages\EditPemohon::route('/{record}/edit'),
        ];
    }
}
