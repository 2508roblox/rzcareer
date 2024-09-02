<?php

namespace App\Filament\Resources\CommonCityResource\Pages;

use App\Filament\Resources\CommonCityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommonCity extends EditRecord
{
    protected static string $resource = CommonCityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
