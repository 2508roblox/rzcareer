<?php

namespace App\Filament\RecruiterPanel\Resources\JobPostResource\Pages;

use App\Filament\RecruiterPanel\Resources\JobPostResource;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Resources\Pages\ListRecords;

class ListJobPosts extends ListRecords
{
    protected static string $resource = JobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
     
}
