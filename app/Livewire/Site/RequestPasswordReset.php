<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class RequestPasswordReset extends Component
{
    public $email;
    
    protected $rules = [
        'email' => 'required|email|exists:users,email'
    ];

    protected $messages = [
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không hợp lệ',
        'email.exists' => 'Email này chưa được đăng ký'
    ];

    public function sendResetLink()
    {
        $this->validate();

        // Tạo token reset password
        $token = Str::random(64);

        // Lưu thông tin reset vào DB
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $this->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        // Gửi email chứa link reset password
        Mail::to($this->email)->send(new ResetPasswordMail($token));

        session()->flash('message', 'Chúng tôi đã gửi link reset mật khẩu vào email của bạn!');
    }

    public function render()
    {
        return view('livewire.site.request-password-reset')
        ->layout('components.layouts.app');
    }
}
