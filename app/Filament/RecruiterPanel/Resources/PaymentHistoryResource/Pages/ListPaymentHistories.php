<?php

namespace App\Filament\RecruiterPanel\Resources\PaymentHistoryResource\Pages;

use App\Filament\RecruiterPanel\Resources\PaymentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentHistories extends ListRecords
{
    protected static string $resource = PaymentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
