<?php

namespace App\Filament\RecruiterPanel\Resources\PurchasedServiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\PurchasedServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPurchasedServices extends ListRecords
{
    protected static string $resource = PurchasedServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
