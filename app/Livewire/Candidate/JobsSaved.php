<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use App\Models\SavedJobPost; // Import the SavedJobPost model
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait

class JobsSaved extends Component
{
    use LivewireAlert; // Use the LivewireAlert trait for alert functionality

    public $savedJobs; // Variable to hold saved jobs

    public function mount()
    {
        // Retrieve the saved jobs for the authenticated user
        $this->savedJobs = SavedJobPost::where('user_id', Auth::id())
            ->with('jobPost') // Eager load the related job post
            ->get();
    }

    // Method to remove a job from saved jobs
    public function removeJob($jobId)
    {
        $savedJob = SavedJobPost::where('user_id', Auth::id())
            ->where('job_post_id', $jobId)
            ->first();

        if ($savedJob) {
            $savedJob->delete(); // Remove the saved job
            
            // Refresh the saved jobs list
            $this->savedJobs = SavedJobPost::where('user_id', Auth::id())
                ->with('jobPost')
                ->get();

            // Display success alert with options
            $this->alert('success', 'Đã xóa việc làm khỏi danh sách lưu.', [
                'position' => 'center', // Center the alert
                'timer' => 3000, // Auto-dismiss after 3 seconds
                'toast' => true, // Show as a toast
                'showCloseButton' => true, // Optionally show a close button
            ]); 
        } else {
            // Display error alert with options if job not found
            $this->alert('error', 'Không tìm thấy việc làm.', [
                'position' => 'center', // Center the alert
                'timer' => 3000, // Auto-dismiss after 3 seconds
                'toast' => true, // Show as a toast
                'showCloseButton' => true, // Optionally show a close button
            ]); 
        }
    }

    public function render()
    {
        return view('livewire.candidate.jobs-saved', [
            'savedJobs' => $this->savedJobs, // Pass saved jobs to the view
        ]);
    }
}
