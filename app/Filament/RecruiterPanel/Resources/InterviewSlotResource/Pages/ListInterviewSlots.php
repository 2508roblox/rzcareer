<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewSlotResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewSlotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterviewSlots extends ListRecords
{
    protected static string $resource = InterviewSlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
