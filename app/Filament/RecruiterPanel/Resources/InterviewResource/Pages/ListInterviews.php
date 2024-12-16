<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListInterviews extends ListRecords
{
    protected static string $resource = InterviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Get the current user's company ID
        $companyId = Auth::user()->company->id;

        // Return the query filtered by the job posts that belong to the user's company
        return parent::getTableQuery()
            ->whereHas('jobPost', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            });
    }
}
