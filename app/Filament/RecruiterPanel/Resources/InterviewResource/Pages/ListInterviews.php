<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
