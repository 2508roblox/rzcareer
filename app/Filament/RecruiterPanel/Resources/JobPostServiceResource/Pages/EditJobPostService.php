<?php

namespace App\Filament\RecruiterPanel\Resources\JobPostServiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\JobPostServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobPostService extends EditRecord
{
    protected static string $resource = JobPostServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
