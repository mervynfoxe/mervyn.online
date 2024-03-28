<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Filament\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tooltip_text')
                    ->maxLength(255),
                Forms\Components\Select::make('link_group_id')
                    ->label('Group')
                    ->relationship('linkGroup', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
//                        Forms\Components\FileUpload::make('icon')
//                            ->image()
//                            ->disk('public')
//                            ->directory('images/icons'),
                        Forms\Components\Select::make('environment')
                            ->relationship('environment', 'name'),
                    ]),
//                Forms\Components\FileUpload::make('icon')
//                    ->image()
//                    ->disk('public')
//                    ->directory('images/icons')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('order')
            ->reorderable('order')
            ->defaultGroup(
                Tables\Grouping\Group::make('linkGroup.name')
                    ->label('Group')
                    ->collapsible()
            )
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->formatStateUsing(function (string $state) {
                        $url = preg_replace('/^(?!https?:\/\/)(.*:\/\/)/i', 'http://', $state);
                        $parts = parse_url($url);
                        return preg_replace('#^www\.(.+\.)#i', '$1', $parts['host']);
                    })
                    ->tooltip(fn (string $state): string => $state),
                Tables\Columns\ImageColumn::make('icon.path')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('tooltip_text')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}
