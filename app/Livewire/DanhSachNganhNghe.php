<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CommonCareer;

class DanhSachNganhNghe extends Component
{
    
    public $careers;

    public function mount()
    {
        // Lấy danh sách các ngành nghề và đếm số lượng job post có trang ngành nghề đó
        $this->careers = CommonCareer::withCount('jobPosts')
            ->get();
    }

    public function render()
    {
        return view('livewire.danh-sach-nganh-nghe', [
            'careers' => $this->careers
        ]);
    }
}
