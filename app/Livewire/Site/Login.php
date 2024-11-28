<?php

namespace App\Livewire\Site;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Laravel\Socialite\Facades\Socialite;

class Login extends Component
{
    use LivewireAlert;

    public $email = '';
    public $password = '';
    public $rememberMe = false; // Add rememberMe property

    public function mount()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Redirect to dashboard or home page if authenticated
            return redirect('/'); // Change '/dashboard' to your desired route
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function login()
    // {
    //     // Validate email and password
    //     $this->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     // Attempt to authenticate the user
    //     if ($this->authenticate($this->email, $this->password)) {
    //         // Optionally remember the user if the checkbox is checked
    //         if ($this->rememberMe) {
    //             Auth::loginUsingId($this->email, true);
    //         } else {
    //             Auth::loginUsingId($this->email);
    //         }

    //         $this->alert('success', 'Đăng nhập thành công!');
    //         // Redirect or perform any action after login
    //         return redirect('/'); // Redirect to your desired route
    //     } else {
    //         $this->alert('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin!');
    //     }
    // }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->alert('error', 'Tài khoản không tồn tại.');
            return;
        }

        if ($user->email_verified_at === null) {
            $this->alert('error', 'Vui lòng xác thực email để đăng nhập hệ thống!');
            return;
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->rememberMe)) {
            $this->alert('success', 'Đăng nhập thành công!');
            return redirect('/');
        }

        $this->alert('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin!');
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->email)->first();

            if ($findUser) {
                // Login the user if the email is found in the database
                Auth::login($findUser);

                return redirect('/'); // Redirect to home after login
            } else {
                // Redirect to login with an error message if the email is not found
                return redirect('/site/login')->withErrors('The Gmail address is not registered.');
            }
        } catch (\Exception $e) {
            return redirect('/site/login')->withErrors('Something went wrong or you have denied the app permissions.');
        }
    }

    // private function authenticate($email, $password)
    // {
    //     $user = User::where('email', $email)->first();

    //     if ($user && $user->email_verified_at === null) {
    //         $this->alert('error', 'Vui lòng xác thực email để đăng nhập hệ thống!');
    //         return false;
    //     }
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         return true; // Đăng nhập thành công
    //     }
    //     return false; // Đăng nhập thất bại
    // }
    private function authenticate($email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return false;
        }

        if ($user->email_verified_at === null) {
            $this->alert('error', 'Vui lòng xác thực email để đăng nhập hệ thống!');
            return false;
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout(); // Log out the user
        $this->alert('success', 'Đăng xuất thành công!'); // Show success alert
        // Optionally redirect after logout, e.g., return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.site.login');
    }
}