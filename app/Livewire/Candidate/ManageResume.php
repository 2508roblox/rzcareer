<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ManageResume extends Component
{
    use LivewireAlert;

    public function render()
    {
        $this->alert('success', "Mật khẩu đã được đổi thành công!");
        return view('livewire.candidate.manage-resume');
    }
}
