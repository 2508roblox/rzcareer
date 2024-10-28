<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\CompanyReview as CompanyReviewModel;

class CompanyReview extends Component
{
    use LivewireAlert; // Use the LivewireAlert trait
    public $company_id; // Thêm thuộc tính để lưu thông tin công ty
    // Review attributes
    public $rating_1;
    public $rating_2;
    public $rating_3;
    public $rating_4;
    public $rating_5;
    public $title;
    public $content;

    public function mount($company_id)
    {
        $this->company_id = $company_id; // Set the company ID
    }
    public function render()
    {
        return view('livewire.company-review');
    }

    public function submitReview()
    {
        // Check if the user is authenticated
        // Check if the user is authenticated
        if (!Auth::check()) {
            $this->alert('error', 'Đăng nhập để đánh giá!');
            // Dispatch a browser event for the redirect after the alert
            return; // Stop further execution
        }
        // Get the authenticated user's ID
        $user = Auth::id();

        // Validate input data before creating the review
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rating_1' => 'required|integer|min:1|max:5',
            'rating_2' => 'required|integer|min:1|max:5',
            'rating_3' => 'required|integer|min:1|max:5',
            'rating_4' => 'required|integer|min:1|max:5',
            'rating_5' => 'required|integer|min:1|max:5',
        ]);

        // Create the review
        CompanyReviewModel::create([
            'user_id' => $user,
            'company_id' => $this->company_id,
            'title' => $this->title,
            'content' => $this->content, // Ensure this variable exists
            'salary_benefit' => $this->rating_1,
            'training_opportunity' => $this->rating_2,
            'employee_care' => $this->rating_3,
            'company_culture' => $this->rating_4,
            'workplace_environment' => $this->rating_5,
        ]);

        // Success alert
        $this->alert('success', 'Đánh giá công ty thành công!');

        // Reset form fields after submission
        $this->reset(['title', 'content', 'rating_1', 'rating_2', 'rating_3', 'rating_4', 'rating_5']);
    }
}
