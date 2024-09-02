<?php

namespace App\Filament\Resources\SavedResumeResource\Pages;

use App\Filament\Resources\SavedResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSavedResume extends EditRecord
{
    protected static string $resource = SavedResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
