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

        // Kiểm tra tệp hợp lệ với thông báo tiếng Việt
        $messages = [
            'fileCv.required' => 'Vui lòng chọn file CV để tải lên.',
            'fileCv.file' => 'Tệp tải lên không hợp lệ.',
            'fileCv.mimes' => 'CV phải là file có định dạng: pdf, doc hoặc docx.',
            'fileCv.max' => 'Kích thước file không được vượt quá 2MB.'
        ];

        $this->validate([
            'fileCv' => 'required|file|mimes:pdf,doc,docx|max:2048', // Giới hạn 2MB
        ], $messages);

        try {
            // Lấy user hiện tại và seeker profile đầu tiên
            $user = Auth::user();
            $seekerProfile = SeekerProfile::where('user_id', $user->id)->first();

            if (!$seekerProfile) {
                session()->flash('error', 'Không tìm thấy hồ sơ ứng viên của bạn.');
                return;
            }

            // Lưu file vào storage và lấy đường dẫn URL
            $path = $this->fileCv->store('cvs', 'public');
            
            if (!$path) {
                session()->flash('error', 'Có lỗi xảy ra khi lưu file. Vui lòng thử lại.');
                return;
            }

            $fileUrl = Storage::url($path);

            // Cập nhật hoặc tạo mới bản ghi Resume
            $resume = Resume::create([
                'user_id' => $user->id,
                'seeker_profile_id' => $seekerProfile->id,
                'type' => 'secondary',
                'file_url' => $fileUrl
            ]);

            if (!$resume) {
                session()->flash('error', 'Có lỗi xảy ra khi lưu thông tin CV. Vui lòng thử lại.');
                return;
            }

            session()->flash('success', 'Tải CV lên thành công.');
            return redirect()->route('candidate.review', ['resume_id' => $resume->id]);

        } catch (\Exception $e) {
            session()->flash('error', 'Đã có lỗi xảy ra: ' . $e->getMessage());
            return;
        }
    }


    public function render()
    {
        return view('livewire.candidate.import-cv-data');
    }
}
