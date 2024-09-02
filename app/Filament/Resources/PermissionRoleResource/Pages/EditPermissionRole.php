<?php

namespace App\Filament\Resources\PermissionRoleResource\Pages;

use App\Filament\Resources\PermissionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionRole extends EditRecord
{
    protected static string $resource = PermissionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
