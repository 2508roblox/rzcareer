<?php

namespace App\Filament\RecruiterPanel\Resources\PaymentHistoryResource\Pages;

use App\Filament\RecruiterPanel\Resources\PaymentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPaymentHistories extends ListRecords
{
    protected static string $resource = PaymentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
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
