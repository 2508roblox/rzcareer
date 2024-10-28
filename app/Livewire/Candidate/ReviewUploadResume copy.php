<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use App\Models\Resume;

class ReviewUploadResume extends Component
{
    public $resume;

    public function mount($resume_id)
    {
        $this->resume = Resume::findOrFail($resume_id);
    }

    public function render()
    {
        return view('livewire.candidate.review-upload-resume', [
            'resume' => $this->resume,
        ]);
    }
}
