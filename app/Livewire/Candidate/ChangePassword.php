<?php

namespace App\Livewire\Candidate;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChangePassword extends Component
{
    use LivewireAlert;

    public $new_password;
    public $confirm_password;

    public function changePassword()
    {
        // Validate the input
        $this->validate([
            'new_password' => 'required', // Ensure the password meets requirements
        ]);

        // Logic to change the password
      $user_ = User::find(auth()->id())->update(['password' => bcrypt($this->new_password)]);

        // Show a success message
        $this->alert('success', "Mật khẩu đã được đổi thành công!");

        // Optionally, reset the fields after successful change
        $this->reset(['new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.candidate.change-password');
    }
}
