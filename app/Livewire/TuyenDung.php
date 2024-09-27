<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\JobPost;

class TuyenDung extends Component
{
    public $company; // Thêm thuộc tính để lưu thông tin công ty
    public $jobPosts; // Thêm thuộc tính để lưu danh sách job của công ty

    public function mount($slug)
    {
        // Lấy thông tin công ty dựa trên slug
        $this->company = Company::where('slug', $slug)
            ->with(['location', 'companyImages']) // Tải thông tin location và companyImages
            ->firstOrFail();

        // Lấy các job của công ty này
        $this->jobPosts = JobPost::where('company_id', $this->company->id)
            ->with(['career', 'location']) // Load thêm các mối quan hệ nếu cần
            ->get();
    }

    public function render()
    {
        return view('livewire.tuyen-dung', [
            'company' => $this->company, // Chuyển dữ liệu công ty vào view
            'jobPosts' => $this->jobPosts, // Chuyển danh sách job vào view
        ]);
    }
}
