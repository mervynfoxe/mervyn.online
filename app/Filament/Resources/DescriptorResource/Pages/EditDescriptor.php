<?php

namespace App\Filament\Resources\DescriptorResource\Pages;

use App\Filament\Resources\DescriptorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDescriptor extends EditRecord
{
    protected static string $resource = DescriptorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
