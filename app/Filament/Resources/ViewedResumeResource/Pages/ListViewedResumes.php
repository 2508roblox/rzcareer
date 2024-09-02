<?php

namespace App\Filament\Resources\ViewedResumeResource\Pages;

use App\Filament\Resources\ViewedResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListViewedResumes extends ListRecords
{
    protected static string $resource = ViewedResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
