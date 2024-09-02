<?php

namespace App\Filament\RecruiterPanel\Resources\JobPostResource\Pages;

use App\Filament\RecruiterPanel\Resources\JobPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobPost extends EditRecord
{
    protected static string $resource = JobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
