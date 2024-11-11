<?php

namespace App\Livewire;

use App\Jobs\CheckPayment;
use App\Models\CommonCareer;
use Livewire\Component;
use App\Models\JobPost;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;

class HomeIndex extends Component
{
    public $hotJobPosts;  // Danh sách công việc nổi bật
    public $urgentJobPosts; // Danh sách công việc tuyển gấp
    public $companies;
    public $careers;

    // Properties for search
    public $keyword = '';
    public $location = '';

    public function mount()
    {
        // Lấy danh sách các JobPost có is_hot = 1
        $this->hotJobPosts = Cache::remember('hot_job_posts', now()->addMinutes(10), function () {
            return JobPost::with(['career', 'company', 'location', 'city'])
                ->where('is_hot', 1)
                ->orderBy('id', 'asc')
                ->limit(100)
                ->get()
                ->map(function ($jobPost) {
                    $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                    return $jobPost;
                });
        });

        // Cache urgent job posts
        $this->urgentJobPosts = Cache::remember('urgent_job_posts', now()->addMinutes(10), function () {
            return JobPost::with(['career', 'company', 'location', 'city'])
                ->where('is_urgent', 1)
                ->get()
                ->map(function ($jobPost) {
                    $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                    return $jobPost;
                });
        });

        // Cache companies
        $this->companies = Cache::remember('companies', now()->addMinutes(10), function () {
            return Company::limit(100)->get();
        });

        // Cache careers with job post counts
        $this->careers = Cache::remember('careers_with_counts', now()->addMinutes(10), function () {
            return CommonCareer::withCount('jobPosts')
                ->orderBy('job_posts_count', 'desc')
                ->take(12)
                ->get();
        });
        CheckPayment::dispatch();
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
        $urgentJobs = JobPost::where('is_urgent', true)
        ->limit(10)
        ->get();
        return view('livewire.index', [
            'hotJobPosts' => $this->hotJobPosts,
            'urgentJobPosts' => $this->urgentJobPosts,
            'companies' => $this->companies,
            'careers' => $this->careers, // Add this line

        ]);
    }
}
