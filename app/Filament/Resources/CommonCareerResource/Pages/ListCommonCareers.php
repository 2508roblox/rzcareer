<?php

namespace App\Filament\Resources\CommonCareerResource\Pages;

use App\Filament\Resources\CommonCareerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommonCareers extends ListRecords
{
    protected static string $resource = CommonCareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
