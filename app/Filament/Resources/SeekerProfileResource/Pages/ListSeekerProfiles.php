<?php

namespace App\Filament\Resources\SeekerProfileResource\Pages;

use App\Filament\Resources\SeekerProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeekerProfiles extends ListRecords
{
    protected static string $resource = SeekerProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
