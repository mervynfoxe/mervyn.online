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
                //
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
                Tables\Columns\TextColumn::make('icon.path')
                    ->formatStateUsing(fn (string $state): string => basename($state))
                    ->tooltip(function(Link $record) {
                        $icon = $record->icon;
                        if (!$icon) {
                            return NULL;
                        }
                        return '<img src="' . asset($icon->path) . '" alt="' . $icon->alt_text . '" />';
                    }),
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
