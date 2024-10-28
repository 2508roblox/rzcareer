<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Resume;
use App\Models\SeekerProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImportCvData extends Component
{
    use WithFileUploads;

    public $fileCv;

    public function uploadCv()
    {
        // Kiểm tra xem người dùng đã đăng nhập
        if (!Auth::check()) {
            session()->flash('error', 'Vui lòng đăng nhập để tải CV.');
            return;
        }

        // Kiểm tra tệp hợp lệ
        $this->validate([
            'fileCv' => 'required|file|mimes:pdf,doc,docx', // Giới hạn 2MB
        ]);

        // Lấy user hiện tại và seeker profile đầu tiên
        $user = Auth::user();
        $seekerProfile = SeekerProfile::where('user_id', $user->id)->first();

        if (!$seekerProfile) {
            session()->flash('error', 'Không tìm thấy hồ sơ ứng viên.');
            return;
        }

        // Lưu file vào storage và lấy đường dẫn URL
        $path = $this->fileCv->store('cvs', 'public');
        $fileUrl = Storage::url($path);

        // Cập nhật hoặc tạo mới bản ghi Resume với type là 'secondary'
        $resume = Resume::updateOrCreate(
            [
                'user_id' => $user->id,
                'seeker_profile_id' => $seekerProfile->id,
                'type' => 'secondary'
            ],
            [
                'file_url' => $fileUrl
            ]
        );

        session()->flash('success', 'Tải CV thành công.');

        // Chuyển hướng đến trang xem lại CV
        return redirect()->route('candidate.review', ['resume_id' => $resume->id]);
    }


    public function render()
    {
        return view('livewire.candidate.import-cv-data');
    }
}
