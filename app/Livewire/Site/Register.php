<?php

namespace App\Livewire\Site;

use App\Models\User;
use App\Models\Resume;  // Import Resume model
use App\Models\SeekerProfile; // Import SeekerProfile model
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait
use Illuminate\Support\Facades\Auth; // Import Auth facade

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
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required|string|max:255',
        ]);

        try {

            // Create a new user
            $user = User::create([
                'password' => bcrypt($this->password),
                'email' => $this->email,
                'full_name' => $this->full_name,
            ]);
            // Create a seeker profile for the user
            $seekerProfile = SeekerProfile::create([
                'user_id' => $user->id,
                'location_id' => 13, // Đặt mẫu -> sửa sau

            ]);

            // Create a primary resume for the user
            Resume::create([
                'user_id' => $user->id,
                'type' => 'primary',
                'seeker_profile_id' => $seekerProfile->id, // Assuming you want to link it to the seeker profile
            ]);

            // Show success alert using LivewireAlert
            $this->alert('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            // Show error alert if registration fails
            dd($e->getMessage());
            $this->alert('error', 'Đăng ký thất bại! Email đã tồn tại.');
        }

        // Reset fields
        $this->reset();
    }

    public function render()
    {
        return view('livewire.site.register');
    }
}
