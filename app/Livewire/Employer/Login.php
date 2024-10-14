<?php

namespace App\Livewire\Employer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;

    public $user_name;
    public $password;
    public $rememberMe = false;

    protected $rules = [
        'user_name' => 'required',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        // Thực hiện đăng nhập
        if (Auth::attempt(['email' => $this->user_name, 'password' => $this->password], $this->rememberMe)) {
            // Kiểm tra trường has_company
            $user = Auth::user();
            if ($user->has_company == 1) {
                // Đăng nhập thành công, hiển thị thông báo
                $this->alert('success', 'Đăng nhập thành công!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => 'Chào mừng bạn đã trở lại!',
                ]);

                // Chuyển hướng sau khi đăng nhập
                return redirect('/recruiter');
            } else {
                // Nếu người dùng không có has_company = 1, logout và hiển thị thông báo lỗi
                Auth::logout();
                $this->alert('error', 'Đăng nhập thất bại!', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => 'Tài khoản của bạn không có quyền truy cập.',
                ]);
            }
        } else {
            // Đăng nhập thất bại, hiển thị thông báo
            $this->alert('error', 'Đăng nhập thất bại!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Tài khoản hoặc mật khẩu không chính xác.',
            ]);
        }
    }


    public function render()
    {
        return view('livewire.employer.login');
    }
}
