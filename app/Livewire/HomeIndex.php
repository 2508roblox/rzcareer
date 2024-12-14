<?php

namespace App\Livewire;

use App\Events\TestNotification;
use App\Jobs\CheckPayment;
use App\Models\CommonCareer;
use App\Models\User;
use Livewire\Component;
use App\Models\JobPost;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class HomeIndex extends Component
{
    public $hotJobPosts;  // Danh sách công việc nổi bật
    public $urgentJobPosts; // Danh sách công việc tuyển gấp
    public $companies;
    public $careers;
    public $suggestedJobs; // Danh sách công việc gợi ý
    public $user; // Biến để lưu thông tin người dùng

    // Properties for search
    public $keyword = '';
    public $location = '';
    public $userCount;
    public $companyCount;
    public function mount()
    {
        $this->userCount = User::count();
        $this->companyCount = Company::count();
        // Lấy thông tin người dùng nếu đã đăng nhập
        $this->user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
        event(new TestNotification([
            "job_name"=> "Cộng Tác Viên Kiểm Kê Tài Sản (Vpbank)",
            "status"=> "Đã liên hệ"

        ]));
        // Lấy danh sách các JobPost có is_hot = 1
        $this->hotJobPosts = JobPost::with(['career', 'company', 'location', 'city'])
            ->where('is_hot', 1)
            ->orderBy('id', 'asc')
            ->limit(10)
            ->get()
            ->map(function ($jobPost) {
                $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                return $jobPost;
            });

        // Cache urgent job posts
        $this->urgentJobPosts = JobPost::with(['career', 'company', 'location', 'city'])
            ->where('is_urgent', 1)
            ->limit(100) // Thêm giới hạn số lượng bản ghi
            ->get()
            ->map(function ($jobPost) {
                $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                return $jobPost;
            });

        // Cache companies
        $this->companies = Company::limit(100)->get();

        // Cache careers with job post counts
        $this->careers = CommonCareer::withCount('jobPosts')
            ->orderBy('job_posts_count', 'desc')
            ->take(12)
            ->get();

        // Nếu người dùng đã đăng nhập, lấy danh sách công việc phù hợp
        if ($this->user) {
            $this->suggestedJobs = JobPost::with(['career', 'company', 'location', 'city']) // Thêm các quan hệ
                ->where(function ($query) {
                    foreach ($this->user->resumes as $resume) {
                        $query->orWhere('job_name', 'like', '%' . $resume->title . '%');
                    }
                })
                ->limit(4) // Giới hạn số lượng công việc gợi ý
                ->get()
                ->map(function ($jobPost) {
                    $jobPost->activeServices = $jobPost->getActiveServicesByProductId($jobPost->id);
                    return $jobPost;
                });
        } else {
            $this->suggestedJobs = collect(); // Nếu chưa đăng nhập, gán giá trị rỗng
        }

    }

    public function searchJobs()
    {
        // Here you can handle your search logic, e.g. filter job posts
        $this->hotJobPosts = JobPost::with(['career', 'company', 'location'])
            ->when($this->keyword, function ($query) {
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
            'careers' => $this->careers,
            'suggestedJobs' => $this->suggestedJobs, // Truyền danh sách công việc gợi ý vào view
        ]);
    }
}
