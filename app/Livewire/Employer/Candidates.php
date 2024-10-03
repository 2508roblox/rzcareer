<?php

namespace App\Livewire\Employer;

use Livewire\Component;
use App\Models\CommonCareer;
use App\Models\Resume;

class Candidates extends Component
{
    public $careers;

    public function mount()
    {
        // Lấy danh sách các ngành nghề và đếm số lượng hồ sơ tương ứng
        $this->careers = CommonCareer::withCount('jobPosts', 'resumes')
            ->get();
    }

    public function render()
    {
        return view('livewire.employer.candidates', [
            'careers' => $this->careers
        ]);
    }
}
