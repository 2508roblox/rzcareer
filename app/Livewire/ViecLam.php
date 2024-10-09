<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JobPost;
use App\Models\PostActivity; // Import model PostActivity
use App\Models\Resume;
use App\Models\SavedJobPost;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import LivewireAlert trait

class ViecLam extends Component
{
    use LivewireAlert; // Sử dụng LivewireAlert trait

    public $jobPost;
    public $relatedJobs;
    public $relatedJobsFromCareer;
    public $full_name;
    public $email;
    public $phone;

    public function mount($slug)
    {
        // Lấy thông tin JobPost dựa trên slug
        $this->jobPost = JobPost::where('slug', $slug)
            ->with(['career', 'company', 'location'])
            ->firstOrFail();

        // Lấy 3 việc làm mới nhất từ cùng công ty
        $this->relatedJobs = JobPost::where('company_id', $this->jobPost->company_id)
            ->where('slug', '!=', $slug)
            ->latest()
            ->take(3)
            ->with(['career', 'location'])
            ->get();

        // Lấy 10 việc làm liên quan từ cùng ngành nghề
        $this->relatedJobsFromCareer = JobPost::where('career_id', $this->jobPost->career_id)
            ->where('slug', '!=', $slug)
            ->latest()
            ->take(10)
            ->with(['career', 'location'])
            ->get();
    }
    public function saveJob()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, hiển thị thông báo
            $this->alert('error', 'Bạn cần đăng nhập để lưu công việc!', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
            return; // Dừng phương thức nếu chưa đăng nhập
        }

        // Kiểm tra xem công việc đã được lưu chưa
        $existingSavedJob = SavedJobPost::where('job_post_id', $this->jobPost->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingSavedJob) {
            // Nếu đã lưu, hiển thị thông báo
            $this->alert('info', 'Công việc này đã được lưu trước đó!', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
            return; // Dừng phương thức nếu đã lưu
        }

        try {
            // Lưu công việc vào cơ sở dữ liệu
            SavedJobPost::create([
                'job_post_id' => $this->jobPost->id,
                'user_id' => Auth::id(), // ID người dùng đang đăng nhập
            ]);

            // Thông báo thành công
            $this->alert('success', 'Bạn đã lưu công việc thành công!', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
        } catch (\Exception $e) {
            $this->alert('error', 'Có lỗi xảy ra, vui lòng thử lại sau.', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây
            ]);
        }
    }

    public function apply()
    {
        // Kiểm tra xem người dùng đã ứng tuyển vào công việc này chưa
        $existingApplication = PostActivity::where('job_post_id', $this->jobPost->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingApplication) {
            // Nếu đã ứng tuyển, hiển thị thông báo
            $this->alert('info', 'Bạn đã ứng tuyển vào công việc này rồi!', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
            return; // Dừng phương thức nếu đã ứng tuyển
        }

        try {
            // Lấy bản lý lịch chính của người dùng
            $resume = Resume::where('user_id', Auth::id())
                ->first();

            // Kiểm tra xem bản lý lịch có tồn tại hay không
            if (!$resume) {
                $this->alert('error', 'Bạn cần có một bản lý lịch hợp lệ để ứng tuyển!', [
                    'position' => 'center',
                    'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

                ]);
                return; // Dừng phương thức nếu không có bản lý lịch
            }

            // Tạo PostActivity để ghi nhận hoạt động ứng tuyển
            $newPostActivity = PostActivity::create([
                'job_post_id' => $this->jobPost->id,
                'resume_id' => $resume->id, // Sử dụng resume_id từ bản lý lịch
                'user_id' => Auth::id(), // ID người dùng đang đăng nhập
                'full_name' => $this->full_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'status' => 'Chờ xác nhận', // Trạng thái ứng tuyển
                'is_sent_email' => false,
                'is_deleted' => false,
            ]);

            // Thông báo thành công
            $this->alert('success', 'Bạn đã ứng tuyển thành công!', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
        } catch (\Exception $e) {
            $this->alert('error', 'Có lỗi xảy ra, vui lòng thử lại sau.', [
                'position' => 'center',
                'timer' => 3000, // Thời gian hiển thị thông báo trong 3 giây

            ]);
        }
    }

    public function render()
    {
        return view('livewire.viec-lam', [
            'jobPost' => $this->jobPost,
            'relatedJobs' => $this->relatedJobs,
            'relatedJobsFromCareer' => $this->relatedJobsFromCareer,
        ]);
    }
}
