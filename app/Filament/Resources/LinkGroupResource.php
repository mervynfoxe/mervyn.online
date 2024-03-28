<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkGroupResource\Pages;
use App\Filament\Resources\LinkGroupResource\RelationManagers;
use App\Models\Icon;
use App\Models\LinkGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkGroupResource extends Resource
{
    protected static ?string $model = LinkGroup::class;

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
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Group Name'),
                Tables\Columns\TextColumn::make('icon.path')
                    ->formatStateUsing(fn (string $state): string => basename($state))
                    ->tooltip(function(LinkGroup $record) {
                        $icon = $record->icon;
                        if (!$icon) {
                            return NULL;
                        }
                        return '<img src="' . asset($icon->path) . '" alt="' . $icon->alt_text . '" />';
                    }),
                Tables\Columns\TextColumn::make('links_count')
                    ->label('Links')
                    ->counts('links'),
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
            'index' => Pages\ListLinkGroups::route('/'),
            'create' => Pages\CreateLinkGroup::route('/create'),
            'edit' => Pages\EditLinkGroup::route('/{record}/edit'),
        ];
    }
}
