<?php

namespace App\Livewire\Inc;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderNav extends Component
{
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect('/'); // Chuyển hướng về trang chủ hoặc trang đăng nhập
    }
    public function render()
    {
        return view('livewire.inc.header-nav');
    }
}
