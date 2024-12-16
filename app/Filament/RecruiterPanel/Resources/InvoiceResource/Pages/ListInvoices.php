<?php

namespace App\Filament\RecruiterPanel\Resources\InvoiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Add any header actions you need here
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
