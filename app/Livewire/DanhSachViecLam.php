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

    // Capture keyword and location from the URL query string
    public function mount(Request $request)
    {
        $this->keyword = $request->query('keyword', '');
        $this->location = $request->query('location', '');
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
            ->paginate($this->perPage);

        $totalJobs = JobPost::count();

        return view('livewire.danh-sach-viec-lam', [
            'jobPosts' => $jobPosts,
            'totalJobs' => $totalJobs,
        ]);
    }
}
