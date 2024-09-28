<?php

namespace App\Livewire\Inc;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HeaderCandidate extends Component
{
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/'); // Chuyển hướng về trang chủ hoặc trang đăng nhập
    }

    public function render()
    {
        return view('livewire.inc.header-candidate');
    }
}
