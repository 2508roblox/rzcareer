<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JobPost;
use Illuminate\Support\Facades\DB;
use App\Models\CommonLocation;
use App\Models\CommonCity;
use App\Models\CommonDistrict;
use Illuminate\Http\Request;

class JobSearchModal extends Component
{
    use WithPagination;

    public $keyword = '';
    public $location = '';
    public $listLocation;
    public $perPage = 50;
    public $career_id = '';
    public $job_type = '';
    public $type_of_workplace = '';
    public $position = '';
    public $salary = '';
    public $experience = '';
    public $is_hot = false;
    public $is_urgent = false;
    public $isListVisible = false;


    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $activeSort = '';

    protected $queryString = ['job_type', 'salary', 'position', 'experience'];
    protected $resetPageOnUpdate = ['job_type', 'salary', 'position', 'experience'];

    public function updating($name, $value)
    {
        if (in_array($name, $this->resetPageOnUpdate)) {
            $this->resetPage();
        }
    }
    public function updateFilter($field, $value)
    {
        if (property_exists($this, $field)) {
            $this->$field = $value === '' ? null : $value;
            $this->resetPage();
        }
    }


    protected $listeners = [
        'locationSelected',
        'refreshJobList' => 'updateJobList',
        // 'setJobType' => 'updateJobType'
    ];

    public function mount(Request $request)
    {
        $this->keyword = $request->query('keyword', '');
        $this->location = $request->query('location', '');
        $this->career_id = $request->query('career_id', '');
        $this->job_type = $request->query('job_type', '');
        $this->type_of_workplace = $request->query('type_of_workplace', '');
        $this->position = $request->query('position', '');
        $this->salary = $request->query('salary', '');
        $this->experience = $request->query('experience', '');
        $this->is_hot = $request->query('is_hot', false);
        $this->is_urgent = $request->query('is_urgent', false);
        $this->listLocation = collect();
        $this->activeSort = 'relevance';
    }

    public function selectLocation($locationSelected)
    {
        $this->location = $locationSelected;
        $this->listLocation = collect();
        $this->isListVisible = false;
    }

    public function updatedLocation()
    {
        if ($this->location != '') {
            $this->listLocation = CommonLocation::with(['city', 'district'])
                ->whereHas('city', function ($query) {
                    $query->where('name', 'like', '%' . $this->location . '%');
                })
                ->orWhereHas('district', function ($query) {
                    $query->where('name', 'like', '%' . $this->location . '%');
                })
                ->limit(10)
                ->get();

            $this->isListVisible = !$this->listLocation->isEmpty();
        } else {
            $this->listLocation = collect();
            $this->isListVisible = false;
        }
    }

    public function toggleListVisibility()
    {
        $this->isListVisible = true;
    }

    public function hideList()
    {
        $this->isListVisible = false;
    }

    public function updateJobList()
    {
        $this->dispatch('refresh');
    }
    public function sortBy($field)
    {
        $this->activeSort = $field;
        if ($this->sortField === $field) {
            // Đảo ngược thứ tự sắp xếp nếu trường giống nhau
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // Đặt trường mới và sắp xếp theo asc
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

    }


    public function search()
    {
        $this->resetPage();
        $this->updateJobList();
        $this->dispatch ('updateUrl', [
            'keyword' => $this->keyword,
            'location' => $this->location,
        ]);
    }



    public function render()
    {
        $salaryRanges = [
            '0-5000000' => 'Dưới 5 triệu',
            '5000000-10000000' => '5 - 10 triệu',
            '10000000-20000000' => '10 - 20 triệu',
            '20000000-100000000' => 'Trên 20 triệu'
        ];
        $keyword = !empty($this->keyword) ? trim($this->keyword) : '';
        $location = !empty($this->location) ? trim($this->location) : '';

        // Khởi tạo biến district và city
        $district = null;
        $city = null;

        // Nếu có dấu '-', tách district và city
        if (strpos($this->location, '-') !== false) {
            list($district, $city) = array_map('trim', explode('-', $location, 2));
        } else {
            if ($this->location) {
                $isDistrict = CommonDistrict::where('name', 'like', '%' . $this->location . '%')->exists();
                $isCity = CommonCity::where('name', 'like', '%' . $this->location . '%')->exists();

                if ($isDistrict) {
                    $district = $this->location;
                } elseif ($isCity) {
                    $city = $this->location;
                }
            }
        }

        // Truy vấn job posts
        $jobPosts = JobPost::with(['career', 'company', 'location', 'location.city', 'location.district'])

            ->when($keyword, function ($query) {
                return $query->where('job_name', 'like', '%' . $this->keyword . '%');
            })
            ->when($city, function ($query) use ($city) {
                return $query->whereExists(function ($q) use ($city) {
                    $q->select(DB::raw(1))
                        ->from('common_locations as cl')
                        ->whereRaw('job_posts.location_id = cl.id')
                        ->whereExists(function ($subQuery) use ($city) {
                            $subQuery->select(DB::raw(1))
                                ->from('common_cities as cc')
                                ->whereRaw('cl.city_id = cc.id')
                                ->where('cc.name', 'like', '%' . $city . '%');
                        });
                });
            })
            ->when($district, function ($query) use ($district) {
                return $query->whereExists(function ($q) use ($district) {
                    $q->select(DB::raw(1))
                        ->from('common_locations as cl')
                        ->whereRaw('job_posts.location_id = cl.id')
                        ->whereExists(function ($subQuery) use ($district) {
                            $subQuery->select(DB::raw(1))
                                ->from('common_districts as cd')
                                ->whereRaw('cl.district_id = cd.id')
                                ->where('cd.name', 'like', '%' . $district . '%');
                        });
                });
            })
            ->when($this->career_id, function ($query) {
                return $query->where('career_id', $this->career_id);
            })
            ->when($this->job_type, function ($query) {
                return $query->where('job_type', 'like', '%' . $this->job_type . '%');
            })
            ->when($this->type_of_workplace, function ($query) {
                return $query->where('type_of_workplace', 'like', '%' . $this->type_of_workplace . '%');
            })
            ->when($this->position, function ($query) {
                return $query->where('position', 'like', '%' . $this->position . '%');
            })
            ->when($this->salary, function ($query) {
                return $query->where('salary_min', '<=', $this->salary)
                    ->where('salary_max', '>=', $this->salary);
            })
            ->when($this->experience, function ($query) {
                return $query->where('experience', 'like', '%' . $this->experience . '%');
            })
            ->when($this->is_hot, function ($query) {
                return $query->where('is_hot', true);
            })
            ->when($this->is_urgent, function ($query) {
                return $query->where('is_urgent', true);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        // Đếm tổng số việc làm
        $totalJobs = $jobPosts->total();

        return view('livewire.job-search-modal', [
            'jobPosts' => $jobPosts,
            'totalJobs' => $totalJobs,
            'salaryRanges' => $salaryRanges,
            'keyword' => $this->keyword,
            'location' => $this->location,
        ]);
    }
}
