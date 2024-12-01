<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\CompanyImage;
use App\Models\CompanyReview; // Import the CompanyReview model
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;

class TuyenDung extends Component
{
    use LivewireAlert;

    public $company;
    public $jobPosts;
    public $gallery;
    public $reviews; // Add property for reviews

    public function mount($slug)
    {
        // Fetch company information based on slug
        $this->company = Company::where('slug', $slug)
            ->with(['location', 'companyImages'])
            ->firstOrFail();

        // Fetch job posts for this company
        $this->jobPosts = JobPost::where('company_id', $this->company->id)
            ->with(['career', 'location'])
            ->get();

        // Fetch gallery images
        $this->gallery = CompanyImage::where('company_id', $this->company->id)->get();

        // Fetch reviews for the company
        $this->reviews = CompanyReview::where('company_id', $this->company->id)
            ->with('user') // Load related user data for review
            ->get();
    }

    public function render()
    {
        return view('livewire.tuyen-dung', [
            'company' => $this->company,
            'jobPosts' => $this->jobPosts,
            'gallery' => $this->gallery,
            'reviews' => $this->reviews, // Pass reviews to the view
        ]);
    }
}
