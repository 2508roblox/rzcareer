<?php

namespace App\Filament\Resources\CommonDistrictResource\Pages;

use App\Filament\Resources\CommonDistrictResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommonDistricts extends ListRecords
{
    protected static string $resource = CommonDistrictResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
