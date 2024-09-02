<?php

namespace App\Filament\Resources\CommonLocationResource\Pages;

use App\Filament\Resources\CommonLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommonLocations extends ListRecords
{
    protected static string $resource = CommonLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
