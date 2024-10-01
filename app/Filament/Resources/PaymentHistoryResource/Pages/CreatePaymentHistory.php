<?php

namespace App\Filament\Resources\PaymentHistoryResource\Pages;

use App\Filament\Resources\PaymentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentHistory extends CreateRecord
{
    protected static string $resource = PaymentHistoryResource::class;
}
