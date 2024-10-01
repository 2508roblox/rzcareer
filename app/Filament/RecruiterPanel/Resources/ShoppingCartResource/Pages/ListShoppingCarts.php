<?php

namespace App\Filament\RecruiterPanel\Resources\ShoppingCartResource\Pages;

use App\Filament\RecruiterPanel\Resources\ShoppingCartResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoppingCarts extends ListRecords
{
    protected static string $resource = ShoppingCartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
