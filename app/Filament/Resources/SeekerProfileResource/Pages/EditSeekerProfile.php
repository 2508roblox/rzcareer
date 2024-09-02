<?php

namespace App\Filament\Resources\SeekerProfileResource\Pages;

use App\Filament\Resources\SeekerProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeekerProfile extends EditRecord
{
    protected static string $resource = SeekerProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
