<?php

namespace App\Livewire\Employer;

use App\Models\CommonCareer;
use App\Models\Resume;
use App\Models\SavedResume;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CandidateList extends Component
{
    use LivewireAlert;
    public $careerId;
    public $careerName;
    public $companyId;
    public function mount($id)
    {
        $this->careerId = $id;
        $this->careerName = CommonCareer::find($id)->name;
        $this->companyId = auth()->user()->company->id;
    }
    public function saveCandidate($id)
    {
        $savedResume = SavedResume::where('resume_id', $id)->where('company_id', $this->companyId)->first();
        if ($savedResume) {
            $this->alert('error', 'Hồ sơ đã được lưu', [
                'position' => 'center',
                'timer' => 3000,
            ]);
            return;
        }
            SavedResume::create([
                'resume_id' => $id,
                'company_id' => $this->companyId,
            ]);
            $this->alert('success', 'Lưu hồ sơ thành công!', [
                'position' => 'center',
                'timer' => 3000,
            ]);
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
