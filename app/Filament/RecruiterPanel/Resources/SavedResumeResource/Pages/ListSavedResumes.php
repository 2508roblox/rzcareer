<?php

namespace App\Filament\RecruiterPanel\Resources\SavedResumeResource\Pages;

use App\Filament\RecruiterPanel\Resources\SavedResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListSavedResumes extends ListRecords
{
    protected static string $resource = SavedResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Get the current user's company ID
        $companyId = Auth::user()->company->id;

        // Return the query filtered by the company's ID
        return parent::getTableQuery()->where('company_id', $companyId);
    }
}
