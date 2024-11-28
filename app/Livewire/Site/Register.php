<?php

namespace App\Livewire\Site;

use App\Models\User;
use App\Models\Resume;  // Import Resume model
use App\Models\SeekerProfile; // Import SeekerProfile model
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Mail; // Import Mail facade
use App\Mail\VerifyEmail; // Import custom Mailable (sẽ tạo mới)    
use Illuminate\Support\Str;


class Register extends Component
{
    use LivewireAlert; // Use the LivewireAlert trait

    public $full_name;
    public $password;
    public $email;
    public $rememberMe = false;

    public function mount()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            return redirect('/'); // Redirect if authenticated
        }
    }

    public function register()
    {
        // Validate input data
        $this->validate([
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/',
            ],
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
        ], [
            'password.regex' => 'Mật khẩu phải có 8-16 ký tự, chứa ít nhất một chữ hoa, một chữ thường, một chữ số và một ký tự đặc biệt.',
        ]);

        if (User::where('email', $this->email)->exists()) {
            $this->alert('error', 'Email này đã được sử dụng, vui lòng chọn email khác.');
            return; 
        }
        

        try {

            $verificationToken = Str::random(60);


            // Create a new user
            $user = User::create([
                'password' => bcrypt($this->password),
                'email' => $this->email,
                'full_name' => $this->full_name,
                'verification_token' => $verificationToken,  // Lưu mã xác thực vào cơ sở dữ liệu
            ]);
            // Tạo hồ sơ cho User
            $seekerProfile = SeekerProfile::create([
                'user_id' => $user->id,
                'location_id' => 13, // Đặt mẫu -> sửa sau

            ]);

            // Tạo sơ yếu lý lịch chính cho User
            Resume::create([
                'user_id' => $user->id,
                'type' => 'primary',
                'seeker_profile_id' => $seekerProfile->id, // Assuming you want to link it to the seeker profile
            ]);

            // Send email verification
            // $verifycationUrl = route('verification.verify', ['token' => $user->verification_token]);
            $verificationUrl = route('verify.email', ['token' => $verificationToken]);

            // Gửi email xác minh
            Mail::to($this->email)->send(new VerifyEmail($user, $verificationUrl));

            // Show success alert using LivewireAlert
            $this->alert('success', 'Đăng ký thành công! Kiểm tra email để xác minh.');
        } catch (\Exception $e) {
            // Show error alert if registration fails
            dd($e->getMessage());
            $this->alert('error', 'Đăng ký thất bại! Email đã tồn tại.');
        }

        // Reset fields
        $this->reset();
    }

    public function verifyEmail($token)
    {
        // dd($token);
        $user = User::where('verification_token', $token)->first();
        if (!$user) {
            // dd('Không tìm thấy người dùng với token này'); 
        }
        if ($user) {
            // tạo xác minh
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();
            // dd($user);
            return redirect('/site/login')->with('success', 'Email của bạn đã được xác thực thành công! Đăng nhập ngay');
        }

        return redirect('/site/register')->with('error', 'Mã xác thực không hợp lệ hoặc đã hết hạn.');
    }

    public function render()
    {
        return view('livewire.site.register');
    }
}