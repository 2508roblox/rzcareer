<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JobPost; // Import JobPost model

class DanhSachViecLam extends Component
{
    use WithPagination; // Enable pagination

    public $perPage = 50; // Number of items per page

    public function render()
    {
        $jobPosts = JobPost::paginate($this->perPage); // Retrieve paginated job posts
        $totalJobs = JobPost::count(); // Get total job count

        return view('livewire.danh-sach-viec-lam', [
            'jobPosts' => $jobPosts, // Pass paginated job posts to view
            'totalJobs' => $totalJobs, // Pass total job count to view
        ]);
    }
}
