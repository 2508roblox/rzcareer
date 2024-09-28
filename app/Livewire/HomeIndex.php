<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPost;
use App\Models\Company;

class HomeIndex extends Component
{
    public $hotJobPosts;  // Danh sách công việc nổi bật
    public $urgentJobPosts; // Danh sách công việc tuyển gấp
    public $companies;

    // Properties for search
    public $keyword = '';
    public $location = '';

    public function mount()
    {
        // Lấy danh sách các JobPost có is_hot = 1
        $this->hotJobPosts = JobPost::with(['career', 'company', 'location'])
            ->where('is_hot', 1)
            ->get();

        // Lấy danh sách các JobPost có is_urgent = 1
        $this->urgentJobPosts = JobPost::with(['career', 'company', 'location'])
            ->where('is_urgent', 1)
            ->get();

        // Lấy danh sách các công ty
        $this->companies = Company::all();
    }

    public function searchJobs()
    {
        // Here you can handle your search logic, e.g. filter job posts
        $this->hotJobPosts = JobPost::with(relations: ['career', 'company', 'location'])
            ->when($this->keyword, callback: function ($query) {
                return $query->where('job_name', 'like', '%' . $this->keyword . '%');
            })
            ->when($this->location, function ($query) {
                return $query->whereHas('location', function ($q) {
                    $q->where('name', 'like', '%' . $this->location . '%');
                });
            })
            ->get();

        // Optionally, you can clear the search fields after the search
        // $this->keyword = '';
        // $this->location = '';
    }
    public function redirectToJobList()
    {
        // Redirect to the job listings page with the search parameters
        return redirect()->route('danh-sach-viec-lam', [
            'keyword' => $this->keyword,
            'location' => $this->location
        ]);
    }

    public function render()
    {
        return view('livewire.index', [
            'hotJobPosts' => $this->hotJobPosts,
            'urgentJobPosts' => $this->urgentJobPosts,
            'companies' => $this->companies,
        ]);
    }
}
