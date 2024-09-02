<?php

namespace App\Filament\Resources\CommonCareerResource\Pages;

use App\Filament\Resources\CommonCareerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommonCareer extends EditRecord
{
    protected static string $resource = CommonCareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
