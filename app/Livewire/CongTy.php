<?php

namespace App\Livewire;

use App\Models\CommonCareer;
use Livewire\Component;
use Livewire\WithPagination; // Thêm import cho WithPagination
use App\Models\Company;
use Illuminate\Support\Str;

class CongTy extends Component
{
    use WithPagination; // Kích hoạt phân trang

    public $perPage = 10; // Số lượng công ty trên mỗi trang
    public $field_operation; // To store the filtering field

    public function mount()
    {
        // Get the field_operation from query parameters
        $this->field_operation = request()->query('field_operation');
    }
    public function filterByCareer($careerName)
{
    $this->field_operation = Str::lower(str_replace(' ', '-', $careerName)); // Normalize and format the name
    $this->resetPage(); // Reset pagination to the first page
}

    public function render()
    {
        // Normalize the field_operation by replacing hyphens with spaces and converting to lowercase
        $normalizedFieldOperation = Str::lower(str_replace('-', ' ', $this->field_operation));

        // Get the list of companies with the number of job posts, paginated
        $companies = Company::withCount('jobPosts')
            ->when($this->field_operation, function ($query) use ($normalizedFieldOperation) {
                $query->whereRaw('LOWER(field_operation) = ?', [$normalizedFieldOperation]);
            })
            ->paginate($this->perPage);
            $topCareers = CommonCareer::withCount('companies') // Count companies instead of job postings
            ->orderBy('companies_count', 'desc')
            ->take(12)
            ->get();
        return view('livewire.cong-ty', [
            'companies' => $companies,
            'topCareers' => $topCareers, // Pass the top careers to the view

        ]);
    }
}
