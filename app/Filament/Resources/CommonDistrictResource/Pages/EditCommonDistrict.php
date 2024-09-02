<?php

namespace App\Filament\Resources\CommonDistrictResource\Pages;

use App\Filament\Resources\CommonDistrictResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommonDistrict extends EditRecord
{
    protected static string $resource = CommonDistrictResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
