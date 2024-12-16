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
    public $error = [];
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

    public function login()
    {
        $this->error = []; // Reset lỗi trước khi kiểm tra

        // Kiểm tra các trường
        if (empty($this->email)) {
            $this->error['email'] = 'Email không được để trống';
        }

        if (empty($this->password)) {
            $this->error['password'] = 'Mật khẩu không được để trống';
        }

        // Nếu có lỗi, dừng lại và không tiếp tục
        if (count($this->error) > 0) {
            return; // Dừng phương thức nếu có lỗi
        }

        // Attempt to authenticate the user
        if ($this->authenticate($this->email, $this->password)) {
            // Optionally remember the user if the checkbox is checked
            if ($this->rememberMe) {
                Auth::loginUsingId($this->email, true);
            } else {
                Auth::loginUsingId($this->email);
            }

            $this->alert('success', 'Đăng nhập thành công!');
            return redirect('/'); // Redirect to your desired route
        } else {
            $this->error['login'] = 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin!';
        }
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

    private function authenticate($email, $password)
    {
        return Auth::attempt(['email' => $email, 'password' => $password]); // Use Auth to attempt login
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
