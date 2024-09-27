<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination; // Thêm import cho WithPagination
use App\Models\Company;

class CongTy extends Component
{
    use WithPagination; // Kích hoạt phân trang

    public $perPage = 10; // Số lượng công ty trên mỗi trang

    public function render()
    {
        // Lấy danh sách công ty cùng với số lượng việc làm, phân trang
        $companies = Company::withCount(relations: 'jobPosts')->paginate($this->perPage);

        return view('livewire.cong-ty', [
            'companies' => $companies,
        ]);
    }
}
