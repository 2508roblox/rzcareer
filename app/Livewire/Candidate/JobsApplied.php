<?php
namespace App\Livewire\Candidate;
namespace App\Livewire\Candidate;

use Livewire\Component;
use App\Models\PostActivity;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class JobsApplied extends Component
{
    use LivewireAlert;

    public $appliedJobs = []; // Khai báo biến để lưu công việc ứng tuyển
    public $selectedStatus = []; // Khai báo biến để lưu trạng thái đã chọn

    public function mount()
    {
        // Lấy danh sách các công việc đã ứng tuyển
        $this->loadAppliedJobs();
    }

    public function loadAppliedJobs()
    {
        $query = PostActivity::where('user_id', Auth::id())
            ->with('jobPost.company', 'jobPost.city');

        // Lọc danh sách công việc theo trạng thái đã chọn
        if (!empty($this->selectedStatus)) {
            $query->whereIn('status', $this->selectedStatus);
        }

        $this->appliedJobs = $query->get();
    }

    public function updatedSelectedStatus()
    {
        // Khi trạng thái đã chọn thay đổi, tải lại danh sách công việc
        $this->loadAppliedJobs();
    }

    public function cancelApplication($jobId)
    {
        $application = PostActivity::where('user_id', Auth::id())
            ->where('id', $jobId)
            ->first();

        if ($application) {
            $application->delete();
            $this->loadAppliedJobs(); // Cập nhật danh sách công việc sau khi hủy ứng tuyển

            $this->alert('success', 'Hủy ứng tuyển thành công.', [
                'position' => 'bottom-start',
            ]);
        } else {
            $this->alert('error', 'Không tìm thấy công việc đã ứng tuyển.', [
                'position' => 'bottom-start',
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
