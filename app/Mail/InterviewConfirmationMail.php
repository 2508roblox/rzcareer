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

    public function __construct($candidateName, $jobName, $interviewTime, $interviewerName, $status)
    {
        $this->candidateName = $candidateName;
        $this->jobName = $jobName;
        $this->interviewTime = $interviewTime;
        $this->interviewerName = $interviewerName;
        $this->status = $status; // Khởi tạo trạng thái
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận Phỏng Vấn',
        );
    }

    public function build()
    {
        // Xác định màu sắc và tiêu đề dựa trên trạng thái
        $statusColors = [
            'scheduled' => '#4A90E2',  // Màu cho đã lên lịch
            'completed' => '#28A745',   // Màu cho đã hoàn thành
            'canceled' => '#DC3545',    // Màu cho đã hủy
        ];

        $statusTitles = [
            'scheduled' => 'Lịch Phỏng Vấn Đã Được Xác Nhận',
            'completed' => 'Phỏng Vấn Đã Hoàn Thành',
            'canceled' => 'Phỏng Vấn Đã Bị Hủy',
        ];

        $currentColor = $statusColors[$this->status] ?? '#333';
        $currentTitle = $statusTitles[$this->status] ?? 'Thông Tin Phỏng Vấn';
        return $this->view('emails.interview_confirmation')
                    ->subject($currentTitle)
                    ->with([
                        'statusColor' => $currentColor,
                        'currentTitle' =>  $currentTitle,
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
