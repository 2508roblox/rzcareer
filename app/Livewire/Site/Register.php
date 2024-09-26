<?php


namespace App\Livewire\Site;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait
use Illuminate\Support\Facades\Auth; // Import Auth facade

class Register extends Component
{
    use LivewireAlert; // Use the LivewireAlert trait

    public $full_name;
    public $password;
    public $email; // Add email property
    public $rememberMe = false;

    public function mount()
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Redirect to dashboard or home page if authenticated
            return redirect('/'); // Change '/dashboard' to your desired route
        }
    }

    public function register()
    {
        // Validate input data
        $this->validate([
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'full_name' => 'required|string|max:255', // Validate full_name as well
        ]);
    
        try {
            // Create a new user
            User::create([
                'password' => bcrypt($this->password), // Hash the password
                'email' => $this->email,
                'full_name' => $this->full_name, // Include full_name
            ]);
    
            // Show success alert using LivewireAlert
            $this->alert('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            // Show error alert if registration fails
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
