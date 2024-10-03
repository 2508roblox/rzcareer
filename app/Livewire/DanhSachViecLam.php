<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JobPost;
use Illuminate\Http\Request;

class DanhSachViecLam extends Component
{
    use WithPagination;

    public $keyword = '';  // Initialize to empty
    public $location = ''; // Initialize to empty
    public $perPage = 50; // Number of items per page
    public $career_id = ''; // Number of items per page
    public $job_type = ''; // type of job
    public $type_of_workplace = ''; // type of workplace
    public $is_hot = false; // Status for hot jobs
    public $is_urgent = false; // Status for urgent jobs

    // Capture keyword and location from the URL query string
    public function mount(Request $request)
    {
        $this->keyword = $request->query('keyword', '');
        $this->location = $request->query('location', '');
        $this->career_id = $request->query('career_id', ''); // Capture career_id
        $this->job_type = $request->query('job_type', ''); // Capture value job type
        $this->type_of_workplace = $request->query('type_of_workplace', ''); // Capture value type of workplace
        $this->is_hot = $request->query('is_hot', false); // Capture value for hot jobs
        $this->is_urgent = $request->query('is_urgent', false); // Capture value for urgent jobs

    }
    public function searchJobs()
    {
        // This method will be called when the form is submitted.
        // You can perform any additional actions here if necessary.
        $this->emitSelf('refresh'); // Optional: emit an event to refresh the component.
    }

    public function render()
    {
        // Retrieve paginated job posts with search logic
        $jobPosts = JobPost::with(['career', 'company', 'location'])
            ->when($this->keyword, function ($query) {
                return $query->where('job_name', 'like', '%' . $this->keyword . '%');
            })
            ->when($this->location, function ($query) {
                return $query->whereHas('location.city', function ($q) {
                    $q->where('name', 'like', '%' . $this->location . '%');
                });
            })
            ->when($this->career_id, function ($query) {
                return $query->where('career_id', $this->career_id); // Filter by career_id
            })
            ->when($this->job_type, function ($query) {
                return $query->where('job_type', 'like', '%' . $this->job_type . '%'); // Filter by job_type
            })
            ->when($this->type_of_workplace, function ($query) {
                return $query->where('type_of_workplace', 'like', '%' .  $this->type_of_workplace); // Filter by type_of_workplace
            })
            ->when($this->is_hot, function ($query) {
                return $query->where('is_hot', true); // Filter by is_hot
            })
            ->when($this->is_urgent, function ($query) {
                return $query->where('is_urgent', true); // Filter by is_urgent
            })
            ->paginate($this->perPage);

        $totalJobs = JobPost::count();
        // dd($jobPosts);

        return view('livewire.danh-sach-viec-lam', [
            'jobPosts' => $jobPosts,
            'totalJobs' => $totalJobs,
        ]);
    }
}
