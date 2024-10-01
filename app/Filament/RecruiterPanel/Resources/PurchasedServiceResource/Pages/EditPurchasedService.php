<?php

namespace App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPurchasedService extends EditRecord
{
    protected static string $resource = PurchasedServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
