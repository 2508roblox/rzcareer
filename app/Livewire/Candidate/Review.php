<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Review extends Component
{
    public $user;
    public $resumes;

    public function mount()
    {
        // Get the authenticated user
        $this->user = Auth::user();

        // Load resumes and their relationships
        if ($this->user) {
            $this->resumes = $this->user->resumes()->with([
                'educationDetails',
                'certificates',
                'experienceDetails',
                'languageSkills',
                'postActivities',
                'viewedResumes',
                'savedResumes',
                'city',
                'career',
                'seekerProfile',
            ])->get();
        }
    }

    public function render()
    {
        // dd($this->resumes);
        return view('livewire.candidate.review', [
            'user' => $this->user,
            'resumes' => $this->resumes,
        ]);
    }
}