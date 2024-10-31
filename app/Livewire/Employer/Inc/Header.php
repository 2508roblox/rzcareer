<?php

namespace App\Livewire\Employer\Inc;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/'); // Điều hướng về trang chính sau khi đăng xuất
    }

    public function render()
    {
        return view('livewire.employer.inc.header');
    }
}