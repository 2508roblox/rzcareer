<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidateName;
    public $jobName;
    public $interviewTime;
    public $interviewerName;
    public $status; // Thêm biến trạng thái
    public $location;
    public $feedback;
    public function __construct($candidateName, $jobName, $interviewTime, $interviewerName, $status, $endTime, $location, $feedback)
    {
        $this->candidateName = $candidateName;
        $this->jobName = $jobName;
        $this->interviewTime = $interviewTime;
        $this->interviewerName = $interviewerName;
        $this->status = $status; // Khởi tạo trạng thái
        $this->endTime = $endTime;
        $this->location = $location;
        $this->feedback = $feedback;
        $this->from('hoangtlhps26819@fpt.edu.vn', 'RZ Career');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận Phỏng Vấn',
        );
    }

    public function build()
    {
        $statusColors = [
            'scheduled' => '#4A90E2',  // Blue for scheduled
            'completed' => '#28A745',  // Green for completed
            'canceled' => '#DC3545',   // Red for canceled
        ];

        $statusTitles = [
            'scheduled' => 'Thông Báo Lịch Phỏng Vấn',
            'completed' => 'Xác Nhận Hoàn Thành Phỏng Vấn',
            'canceled' => 'Thông Báo Hủy Phỏng Vấn',
        ];

        $currentColor = $statusColors[$this->status] ?? '#333';
        $currentTitle = $statusTitles[$this->status] ?? 'Thông Tin Phỏng Vấn';

        return $this->view('emails.interview_confirmation')
                    ->subject($currentTitle)
                    ->with([
                        'statusColor' => $currentColor,
                        'currentTitle' => $currentTitle,
                    ]);
    }


    public function getColorByStatus($status)
    {
        return match ($status) {
            'scheduled' => '#4CAF50', // Xanh lá cây
            'completed' => '#2196F3',  // Xanh dương
            'canceled' => '#F44336',   // Đỏ
            default => '#000000',      // Mặc định là đen
        };
    }

    public function attachments(): array
    {
        return [];
    }
}
