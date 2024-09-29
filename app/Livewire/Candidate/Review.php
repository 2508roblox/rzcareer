<?php
namespace App\Livewire\Candidate;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Review extends Component
{
    public $user;
    public $resumes;
    public $resumeDataPercentage; // Variable to hold percentage of resumes with data
    public $a; // Variable to hold the status of advancedSkills, educationDetails, experienceDetails, and seekerProfile

    public function mount()
    {
        // Get the authenticated user
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
                return $resume->advancedSkills->isNotEmpty(); // Check if advancedSkills has at least one item
            })) {
                $this->a = 1; // Set a to 1 if advancedSkills exist
            }

            // Increment a if educationDetails has at least one item
            if ($this->resumes->contains(function ($resume) {
                return $resume->educationDetails->isNotEmpty(); // Check if educationDetails has at least one item
            })) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if experienceDetails has at least one item
            if ($this->resumes->contains(function ($resume) {
                return $resume->experienceDetails->isNotEmpty(); // Check if experienceDetails has at least one item
            })) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if seekerProfile has no empty fields
            if ($this->resumes->contains(function ($resume) {
                return $this->isSeekerProfileComplete($resume->seekerProfile); // Check if seekerProfile has no empty fields
            })) {
                $this->a += 1; // Increment a by 1
            }

            // Calculate the percentage of resumes with data (if needed)
            // $this->resumeDataPercentage = ...
        }
    }

    private function isSeekerProfileComplete($seekerProfile)
    {
        // dd($seekerProfile);
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
        
        return view('livewire.candidate.review', [
            'user' => $this->user,
            'resumes' => $this->resumes,
        ]);
        
    }
}
