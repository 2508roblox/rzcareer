<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidateName;
    public $jobName;
    public $companyName;
    public $typeOfWorkplace;
    public $position;
    public $academicLevel;
    public $experience;
    public $createdAt, $sentAt;
    public function __construct($candidateName, $jobName, $companyName,$jobPost)
    {
        $this->candidateName = $candidateName;
        $this->jobName = $jobName;
        $this->companyName = $companyName;
        $this->typeOfWorkplace = $jobPost->type_of_workplace;
        $this->position = $jobPost->position;
        $this->academicLevel = $jobPost->academic_level;
        $this->experience = $jobPost->experience;
        $this->createdAt = \Carbon\Carbon::parse($jobPost->created_at)->format('d/m/Y');
        $this->sentAt = now()->format('d/m/Y H:i');
        $this->from('hoangtlhps26819@fpt.edu.vn', 'RZ Career');

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận Hồ Sơ Ứng Tuyển',
        );
    }

    public function build()
    {
        return $this->view('emails.job-application')
            ->with([
                'candidateName' => $this->candidateName,
                'jobName' => $this->jobName,
                'companyName' => $this->companyName,
                'statusColor' => '#007bff', // Màu sắc có thể thay đổi tùy theo tình trạng
                'typeOfWorkplace' => $this->typeOfWorkplace,
                'position' => $this->position,
                'academicLevel' => $this->academicLevel,
                'experience' => $this->experience,
                'createdAt' => $this->createdAt,
                'sentAt' => $this->sentAt,
            ]);
    }
}
