<?php

namespace App\Filament\RecruiterPanel\Resources\InterviewResource\Pages;

use App\Filament\RecruiterPanel\Resources\InterviewResource;
use App\Mail\InterviewConfirmationMail; // Import mailable
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail; // Import Mail facade

class CreateInterview extends CreateRecord
{
    protected static string $resource = InterviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Gán user_id từ người dùng hiện tại
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function afterCreate(): void
    {
        // Lấy thông tin cần thiết để gửi email
        $candidate = $this->record->candidate;
        $jobPost = $this->record->jobPost;
        $slot = $this->record->slot;

        // Gửi email thông báo
        Mail::to($candidate->email)->send(new InterviewConfirmationMail(
            $candidate->full_name,
            $jobPost->job_name,
            $slot->start_time,
            $slot->interviewer->full_name,
            $this->record->status, // Truyền trạng thái vào mailable
            $slot->end_time,
            $slot->location,
            $this->record->feedback
        ));
    }


}
