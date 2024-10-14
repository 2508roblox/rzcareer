<?php

namespace App\Livewire\Employer;

use App\Models\Resume;
use Livewire\Component;

class CandidateList extends Component
{
    public $careerId;

    public function mount($id)
    {
        $this->careerId = $id;
    }

    public function render()
    {
        // Lấy danh sách resume có career_id bằng cách join với các bảng liên quan
        $resumes = Resume::with(['seekerProfile.user', 'educationDetails', 'experienceDetails', 'certificates', 'advancedSkills', 'languageSkills'])
            ->where('career_id', $this->careerId)
            ->get();

        return view('livewire.employer.candidate-list', [
            'resumes' => $resumes
        ]);
    }
}
