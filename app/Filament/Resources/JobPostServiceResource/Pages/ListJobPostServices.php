<?php

namespace App\Filament\Resources\JobPostServiceResource\Pages;

use App\Filament\Resources\JobPostServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobPostServices extends ListRecords
{
    protected static string $resource = JobPostServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
