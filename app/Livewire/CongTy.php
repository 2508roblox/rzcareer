<?php

namespace App\Livewire;

use App\Models\CommonCareer;
use App\Models\CommonLocation;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use Illuminate\Support\Str;

class CongTy extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $field_operation;
    public $careerName;
    public $companyLocation;
    public $companyName;
    public $locations;

    public function mount()
    {
        // Get query parameters for filtering
        $this->field_operation = request()->query('field_operation');
        $this->careerName = request()->query('careerName');
        $this->companyLocation = request()->query('companyLocation');
        $this->companyName = request()->query('companyName'); // New property for company name filtering

        // Fetch all locations
        $this->locations = CommonLocation::all();
    }

    public function render()
    {
        // Format `field_operation` based on `careerName` (if provided)
        if ($this->careerName) {
            $this->field_operation = Str::lower(str_replace(' ', '-', $this->careerName));
        }

        // Normalize field_operation for querying
        $normalizedFieldOperation = Str::lower(str_replace('-', ' ', $this->field_operation));

        // Query companies with filters for career, location, and name
        $companies = Company::withCount('jobPosts')
            ->when($this->field_operation, function ($query) use ($normalizedFieldOperation) {
                $query->whereRaw('LOWER(field_operation) = ?', [$normalizedFieldOperation]);
            })
            ->when($this->companyLocation, function ($query) {
                $query->whereHas('location', function ($locationQuery) {
                    $locationQuery->where('id', $this->companyLocation);
                });
            })
            ->when($this->companyName, function ($query) {
                $query->where('company_name', 'like', '%' . $this->companyName . '%');
            })
            ->paginate($this->perPage);

        // Get top careers
        $topCareers = CommonCareer::withCount('companies')
            ->orderBy('companies_count', 'desc')
            ->get();

        return view('livewire.cong-ty', [
            'companies' => $companies,
            'topCareers' => $topCareers,
            'locations' => $this->locations,
        ]);
    }
}
