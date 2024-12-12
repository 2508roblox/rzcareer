<?php

namespace App\Filament\RecruiterPanel\Resources\PostActivityResource\Pages;

use App\Filament\RecruiterPanel\Resources\PostActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostActivities extends ListRecords
{
    protected static string $resource = PostActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
