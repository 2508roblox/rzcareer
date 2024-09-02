<?php

namespace App\Filament\RecruiterPanel\Resources\JobPostResource\Pages;

use App\Filament\RecruiterPanel\Resources\JobPostResource;
use App\Models\Company;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateJobPost extends CreateRecord
{
    protected static string $resource = JobPostResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
        $companyIds = Company::where('user_id', $user->id)->pluck('id');
        $data['company_id'] =  $companyIds[0];
        $data['user_id'] =  $user->id;

        return $data;
    }

}
