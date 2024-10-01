<?php

namespace App\Filament\Resources\PaymentHistoryResource\Pages;

use App\Filament\Resources\PaymentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentHistory extends EditRecord
{
    protected static string $resource = PaymentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
