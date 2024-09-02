<?php

namespace App\Filament\Resources\JobPostResource\Pages;

use App\Filament\Resources\JobPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;
}
