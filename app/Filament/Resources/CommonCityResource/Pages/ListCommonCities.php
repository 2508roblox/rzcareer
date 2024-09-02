<?php

namespace App\Filament\Resources\CommonCityResource\Pages;

use App\Filament\Resources\CommonCityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommonCities extends ListRecords
{
    protected static string $resource = CommonCityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
