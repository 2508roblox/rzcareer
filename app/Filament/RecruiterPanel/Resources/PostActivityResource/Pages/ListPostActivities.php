<?php

namespace App\Filament\RecruiterPanel\Resources\PostActivityResource\Pages;

use App\Filament\RecruiterPanel\Resources\PostActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPostActivities extends ListRecords
{
    protected static string $resource = PostActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
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
