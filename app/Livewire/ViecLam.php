<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPost;

class ViecLam extends Component
{
    public $jobPost;

    public function mount($slug)
    {
        // Lấy thông tin JobPost dựa trên slug
        $this->jobPost = JobPost::where('slug', $slug)->with(['career', 'company', 'location'])->firstOrFail();
    }

    public function render()
    {
        return view('livewire.viec-lam', [
            'jobPost' => $this->jobPost,
        ]);
    }
}
