<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewSlotResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewSlotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterviewSlot extends EditRecord
{
    protected static string $resource = InterviewSlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
