<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DescriptorResource\Pages;
use App\Filament\Resources\DescriptorResource\RelationManagers;
use App\Models\Descriptor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DescriptorResource extends Resource
{
    protected static ?string $model = Descriptor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Checkbox::make('active')
                    ->label('Display on Homepage')
                    ->default(TRUE),
                Forms\Components\Select::make('environment_id')
                    ->relationship('environment', 'name')
                    ->default(config('app.environment.id', 1)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('environment.name')
                    ->label('Environment'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('environment_id')
                    ->relationship('environment', 'name'),
                Tables\Filters\Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('active', true))
                    ->toggle()
                    ->label('Active only'),
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
            'index' => Pages\ListDescriptors::route('/'),
            'create' => Pages\CreateDescriptor::route('/create'),
            'edit' => Pages\EditDescriptor::route('/{record}/edit'),
        ];
    }
}
