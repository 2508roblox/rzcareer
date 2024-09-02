<?php

namespace App\Filament\Resources\SavedJobPostResource\Pages;

use App\Filament\Resources\SavedJobPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSavedJobPosts extends ListRecords
{
    protected static string $resource = SavedJobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
