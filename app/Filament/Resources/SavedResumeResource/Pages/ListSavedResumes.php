<?php

namespace App\Filament\Resources\SavedResumeResource\Pages;

use App\Filament\Resources\SavedResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSavedResumes extends ListRecords
{
    protected static string $resource = SavedResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
