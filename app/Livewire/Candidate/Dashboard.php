<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $user; // Define a public property for the user
    public $resumes; // Store resumes of the user
    public $a; // Define a public property for the status variable

    public function mount()
    {
        // Retrieve the authenticated user
        $this->user = Auth::user();

        // Initialize $a
        $this->a = 0; // Start with 0

        // Load resumes and their relationships
        if ($this->user) {
            $this->resumes = $this->user->resumes()->with([
                'educationDetails',
                'certificates',
                'experienceDetails',
                'advancedSkills',
                'languageSkills',
                'seekerProfile',
            ])->get();

            // Check advancedSkills
            if ($this->resumes->contains(function ($resume) {
                return $resume->advancedSkills->isNotEmpty();
            })) {
                $this->a += 1; // Increment a if advancedSkills exist
            }

            // Increment a if educationDetails has at least one item
            if ($this->resumes->contains(function ($resume) {
                return $resume->educationDetails->isNotEmpty();
            })) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if experienceDetails has at least one item
            if ($this->resumes->contains(function ($resume) {
                return $resume->experienceDetails->isNotEmpty();
            })) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if seekerProfile has no empty fields
            if ($this->resumes->contains(function ($resume) {
                return $this->isSeekerProfileComplete($resume->seekerProfile);
            })) {
                $this->a += 1; // Increment a by 1
            }
        }
    }

    private function isSeekerProfileComplete($seekerProfile)
    {
        // Check if all relevant fields in seekerProfile are not empty
        return !empty($seekerProfile->user_id) &&
               !empty($seekerProfile->location_id) &&
               !empty($seekerProfile->phone) &&
               !empty($seekerProfile->birthday) &&
               !empty($seekerProfile->gender) &&
               !empty($seekerProfile->marital_status) &&
               !empty($seekerProfile->introduction) &&            // Giới thiệu bản thân
               !empty($seekerProfile->current_residence) &&       // Chỗ ở hiện tại
               !empty($seekerProfile->working_province) &&        // Tỉnh/thành làm việc
               !empty($seekerProfile->degree) &&                  // Bằng cấp
               !empty($seekerProfile->current_salary) &&          // Mức lương hiện tại
               !empty($seekerProfile->expected_salary_min) &&     // Mức lương mong muốn tối thiểu
               !empty($seekerProfile->expected_salary_max);        // Mức lương mong muốn tối đa
    }

    public function render()
    {
        return view('livewire.candidate.dashboard', [
            'user' => $this->user, // Pass the user to the view
            'a' => $this->a, // Pass the a variable to the view
            'resumes' => $this->resumes, // Pass resumes to the view if needed
        ]);
    }
}
