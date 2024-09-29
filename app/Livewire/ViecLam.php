<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPost;

class ViecLam extends Component
{
    public $jobPost;
    public $relatedJobs; // Thêm biến để lưu việc làm liên quan
    public  $relatedJobsFromCareer ; // Thêm biến để lưu việc làm liên quan

    public function mount($slug)
    {
        // Lấy thông tin JobPost dựa trên slug
        $this->jobPost = JobPost::where('slug', $slug)
            ->with(['career', 'company', 'location'])
            ->firstOrFail();

        // Lấy 3 việc làm mới nhất từ cùng công ty
        $this->relatedJobs = JobPost::where('company_id', $this->jobPost->company_id) // Giả định có trường company_id trong JobPost
            ->where('slug', '!=', $slug) // Loại bỏ việc làm hiện tại
            ->latest() // Sắp xếp theo thời gian tạo mới nhất
            ->take(3) // Lấy tối đa 3 việc làm
            ->with(['career', 'location']) // Eager load các quan hệ cần thiết
            ->get();

            $this->relatedJobsFromCareer = JobPost::where('career_id', $this->jobPost->career_id)
            ->where('slug', '!=', $slug) // Loại bỏ việc làm hiện tại
            ->latest() // Sắp xếp theo thời gian tạo mới nhất
            ->take(10) // Lấy tối đa 10 việc làm
            ->with(['career', 'location'])
            ->get();

    }

    public function render()
    {
        return view('livewire.viec-lam', [
            'jobPost' => $this->jobPost,
            'relatedJobs' => $this->relatedJobs, // Truyền dữ liệu việc làm liên quan vào view
            'relatedJobsFromCareer' => $this->relatedJobsFromCareer, // Truyền dữ liệu việc làm liên quan vào view
        ]);
    }
}
