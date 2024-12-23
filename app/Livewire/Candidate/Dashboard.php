<?php

namespace App\Livewire\Candidate;

use App\Models\JobPost;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PostActivity; // Import the PostActivity model
use App\Models\Resume;
use App\Models\SavedJobPost; // Import the SavedJobPost model

class Dashboard extends Component
{
    public $user; // Define a public property for the user
    public $resumes; // Store resumes of the user
    public $a; // Define a public property for the status variable
    public $appliedJobsCount; // Property to hold the count of applied jobs
    public $savedJobsCount; // Property to hold the count of saved jobs
    public $secondaryResumes; // Property to hold the count of saved jobs
    public $suggestedJobs; // New property for suggested jobs
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




             $this->secondaryResumes = Resume::where('user_id', $this->user->id)
            ->where('type', 'secondary')
            ->get();

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
            // Count the number of applied jobs
            $this->appliedJobsCount = PostActivity::where('user_id', $this->user->id)->count(); // Get count of applications

            // Count the number of saved jobs
            $this->savedJobsCount = SavedJobPost::where('user_id', $this->user->id)->count(); // Get count of saved jobs
            $this->suggestedJobs = JobPost::with(['career', 'company', 'location', 'city']) // Thêm các quan hệ
            ->where(function ($query) {
                foreach ($this->resumes as $resume) {
                    $query->orWhere('job_name', 'like', '%' . $resume->title . '%');
                }
            })
            ->limit(4) // Giới hạn số lượng công việc gợi ý
            ->get()
            ->map(function ($jobPost) {
                $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                return $jobPost;
            });
        
        }
    }
    public function deleteResume($resumeId)
    {
        // Find the resume by ID
        $resume = Resume::find($resumeId);

        if ($resume && $resume->user_id === $this->user->id) {
            // Delete the resume
            $resume->delete();

            // Optionally, you can add a success message or refresh the resumes
            session()->flash('message', 'Resume deleted successfully.');

            // Refresh the resumes list
            $this->secondaryResumes = Resume::where('user_id', $this->user->id)
                                             ->where('type', 'secondary')
                                             ->get();
        } else {
            // Optionally, you can add an error message if the resume was not found
            session()->flash('error', 'Resume not found or you do not have permission to delete it.');
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
            'appliedJobsCount' => $this->appliedJobsCount, // Pass the count to the view
            'savedJobsCount' => $this->savedJobsCount, // Pass saved jobs count to the view
        ]);
    }
}
