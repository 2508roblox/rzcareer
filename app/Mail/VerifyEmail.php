<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $user;
    public $verifycationUrl;
    public function __construct($user, $verifycationUrl)
    {
        $this->user = $user;
        $this->verifycationUrl = $verifycationUrl;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận email người dùng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verify-email', // Đường dẫn tới view email
            with: [
                'user' => $this->user,
                'verifycationUrl' => $this->verifycationUrl,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Xác thực email của bạn')
                    ->view('emails.verify')
                    ->with([
                        'name' => $this->user->full_name,
                        'verificationUrl' => $this->verifycationUrl,
                        'logoUrl' => asset('assets_livewire/logo-light.svg'),
                    ]);
    }
}