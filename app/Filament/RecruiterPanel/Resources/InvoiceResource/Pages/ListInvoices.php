<?php

namespace App\Filament\RecruiterPanel\Resources\InvoiceResource\Pages;

use App\Filament\RecruiterPanel\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
