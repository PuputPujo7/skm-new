<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResource\Pages;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Models\Survey;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-s-star';

    protected static ?string $navigationGroup = 'SKM';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'question';

    protected static ?string $navigationLabel = 'Survey';

    protected static ?string $pluralLabel = 'Survey';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('question')
                // ->required()
                // ->maxLength(191),
                Select::make('pertanyaan_id')
                ->relationship('pertanyaan', 'pertanyaan'),
            Forms\Components\Repeater::make('answer_options')
                ->schema([
                    Forms\Components\TextInput::make('amount')->numeric(),
                    Select::make('label')
                        ->options([
                            'Tidak Baik' => 'Tidak Baik',
                            'Kurang Baik' => 'Kurang Baik',
                            'Baik' => 'Baik',
                            'Sangat Baik' => 'Sangat Baik',
                        ]),
            //         // Forms\Components\TextInput::make('label'),
            // Forms\Components\Repeater::make('answer_options')
            //     ->schema([
            //         Forms\Components\TextInput::make('amount')->numeric(),
            //         Forms\Components\TextInput::make('label'),
                ])
                ->cloneable()
                ->orderable()
                ->createItemButtonLabel('Add')
                ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pertanyaan.pertanyaan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
            Tables\Actions\EditAction::make()->iconButton(),
            Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }
}
