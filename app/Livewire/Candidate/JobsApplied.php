<?php
namespace App\Livewire\Candidate;

use Livewire\Component;
use App\Models\PostActivity;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert; // Import the LivewireAlert trait

class JobsApplied extends Component
{
    use LivewireAlert; // Sử dụng LivewireAlert trait

    public $appliedJobs; // Khai báo biến để lưu công việc ứng tuyển

    public function mount()
    {
        // Lấy danh sách các công việc đã ứng tuyển
        $this->appliedJobs = PostActivity::where('user_id', Auth::id())
            ->with('jobPost.company', 'jobPost.city') // Load mối quan hệ với JobPost, Company và City
            ->get();
    }

    // Phương thức hủy ứng tuyển
    public function cancelApplication($jobId)
    {
        $application = PostActivity::where('user_id', Auth::id())
            ->where('id', $jobId)
            ->first();
    
        if ($application) {
            $application->delete(); // Xóa bản ghi ứng tuyển
            // Cập nhật lại danh sách công việc sau khi xóa
            $this->appliedJobs = PostActivity::where('user_id', Auth::id())
                ->with('jobPost.company', 'jobPost.city')
                ->get();
    
            // Hiển thị thông báo thành công sau khi hủy ứng tuyển
            $this->alert('success', 'Hủy ứng tuyển thành công.', [
                'position' => 'bottom-start', // Position the success alert at the bottom left
            ]);
        } else {
            // Hiển thị thông báo lỗi nếu không tìm thấy ứng tuyển
            $this->alert('error', 'Không tìm thấy công việc đã ứng tuyển.', [
                'position' => 'bottom-start', // Position the error alert at the bottom left
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }
    
    

    public function render()
    {
        return view('livewire.candidate.jobs-applied', [
            'appliedJobs' => $this->appliedJobs,
        ]);
    }
}
