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

    public function __construct($candidateName, $jobName, $companyName)
    {
        $this->candidateName = $candidateName;
        $this->jobName = $jobName;
        $this->companyName = $companyName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác Nhận Hồ Sơ Ứng Tuyển',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application',
        );
    }
}
