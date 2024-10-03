<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewerResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterviewer extends EditRecord
{
    protected static string $resource = InterviewerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
