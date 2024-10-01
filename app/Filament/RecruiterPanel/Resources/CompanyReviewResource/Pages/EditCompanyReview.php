<?php

namespace App\Filament\RecruiterPanel\Resources\CompanyReviewResource\Pages;

use App\Filament\RecruiterPanel\Resources\CompanyReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyReview extends EditRecord
{
    protected static string $resource = CompanyReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
