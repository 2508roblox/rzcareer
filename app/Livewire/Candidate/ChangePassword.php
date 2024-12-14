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
    public $error = []; // Declare the error property

    public function changePassword()
    {
        $this->error = []; // Reset errors

        if (empty($this->new_password)) {
            $this->error['new_password'] = 'Mật khẩu mới không được để trống!';
        } elseif (strlen($this->new_password) < 8) {
            $this->error['new_password'] = 'Mật khẩu mới phải có ít nhất 8 ký tự!';
        }

        if (empty($this->confirm_password)) {
            $this->error['confirm_password'] = 'Xác nhận mật khẩu không được để trống!';
        } elseif ($this->confirm_password !== $this->new_password) {
            $this->error['confirm_password'] = 'Mật khẩu xác nhận không khớp!';
        }

        // If there are errors, return early
        if (!empty($this->error)) {
            return;
        }

        // Logic to change the password
        User::find(auth()->id())->update(['password' => bcrypt($this->new_password)]);

        // Show a success message
        $this->alert('success', "Mật khẩu đã được đổi thành công!");

        // Reset the fields after successful change
        $this->reset(['new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.candidate.change-password');
    }
}
