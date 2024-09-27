<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPost;
use App\Models\Company;

class Index extends Component
{
    public $hotJobPosts;  // Danh sách công việc nổi bật
    public $urgentJobPosts; // Danh sách công việc tuyển gấp
    public $companies;

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

    public function render()
    {
        return view('livewire.index', [
            'hotJobPosts' => $this->hotJobPosts,
            'urgentJobPosts' => $this->urgentJobPosts,
            'companies' => $this->companies,
        ]);
    }
}
