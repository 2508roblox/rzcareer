<?php

namespace App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPurchasedServices extends ListRecords
{
    protected static string $resource = PurchasedServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Add any header actions if needed
        ];
    }

    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Get the current user's ID
        $userId = Auth::id();

        // Return the query filtered by the user's ID
        return parent::getTableQuery()->where('user_id', $userId);
    }
}
