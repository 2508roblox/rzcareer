<?php
namespace App\Livewire\Candidate;

use App\Models\CommonCareer;
use App\Models\CommonCity;
use App\Models\Resume;
use App\Models\ResumeAdvancedSkill;
use App\Models\SeekerProfile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\WithFileUploads;

class Review extends Component
{
    use WithFileUploads;
    public $user;
    public $resumes;
    public $resumeDataPercentage; // Variable to hold percentage of resumes with data
    public $a; // Variable to hold the status of advancedSkills, educationDetails, experienceDetails, and seekerProfile
    public $fullName;
    public $email;
    public $isActive;
    public $isEditing = '';
    public $avatar;
    // user info
    public $cities = [];
    public $city_id ;
    public $careers = [];
    public $career_id ;

    public $title;
    public $slug;
    public $description;
    public $salary_min;
    public $position;
    public $experience;
    public $academic_level;
    public $type_of_workplace;
    public $job_type;
    // primary resume info


    public $phone;
    public $birthday;
    public $gender;
    public $marital_status;
    public $current_residence;
    public $working_province;
    public $degree;
    public $current_salary;
    public $expected_salary_min;
    public $expected_salary_max;
    public $introduction;

    // seeker profile info


    public $skills = [];
    public $newSkill = '';
    public $newExperience = '';
    // advanced skills
    public function toggleEdit($field)
    {
        if ($this->isEditing === $field) {
            $this->isEditing = ''; // Tắt chỉnh sửa nếu đang chỉnh sửa cùng một trường
        } else {
            $this->isEditing = $field; // Chỉnh sửa trường mới
        }
    }
    public function mount()
    {
        // Get the authenticated user
        $this->user = Auth::user();

        // Initialize $a
        $this->a = 0; // Start with 0

        // Load resumes and their relationships
        if ($this->user) {
            $this->resumes = $this->user->resumes()->with([
                'educationDetails',
                'certificates',
                'experienceDetails',
                'advancedSkills',
                'languageSkills',
                'seekerProfile',
            ])->get();

            // Check advancedSkills
            if (
                $this->resumes->contains(function ($resume) {
                    return $resume->advancedSkills->isNotEmpty(); // Check if advancedSkills has at least one item
                })
            ) {
                $this->a = 1; // Set a to 1 if advancedSkills exist
            }

            // Increment a if educationDetails has at least one item
            if (
                $this->resumes->contains(function ($resume) {
                    return $resume->educationDetails->isNotEmpty(); // Check if educationDetails has at least one item
                })
            ) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if experienceDetails has at least one item
            if (
                $this->resumes->contains(function ($resume) {
                    return $resume->experienceDetails->isNotEmpty(); // Check if experienceDetails has at least one item
                })
            ) {
                $this->a += 1; // Increment a by 1
            }

            // Increment a if seekerProfile has no empty fields
            if (
                $this->resumes->contains(function ($resume) {
                    return $this->isSeekerProfileComplete($resume->seekerProfile); // Check if seekerProfile has no empty fields
                })
            ) {
                $this->a += 1; // Increment a by 1
            }

            // Calculate the percentage of resumes with data (if needed)
            // $this->resumeDataPercentage = ...


            //primary resume
            $this->cities = CommonCity::all();
            $this->careers = CommonCareer::all();

            // init primary resume data
            $userId = auth()->id(); // Lấy ID người dùng hiện tại
            $seekerProfile = SeekerProfile::where('user_id', $userId)->first();

            // Kiểm tra xem đã có resume type primary chưa
            $primaryResume = Resume::where('user_id', $userId)
                ->where('type', 'primary')
                ->first();

            if ($primaryResume) {
                // Nếu đã có resume, gán giá trị cho các trường
                $this->title = $primaryResume->title;
                $this->slug = $primaryResume->slug;
                $this->city_id = $primaryResume->city_id;
                $this->career_id = $primaryResume->career_id;
                $this->description = $primaryResume->description;
                $this->salary_min = $primaryResume->salary_min;
                $this->position = $primaryResume->position;
                $this->experience = $primaryResume->experience;
                $this->academic_level = $primaryResume->academic_level;
                $this->type_of_workplace = $primaryResume->type_of_workplace;
                $this->job_type = $primaryResume->job_type;

            } else {
                // Nếu không có resume, tạo mới
            $seekerProfile = SeekerProfile::where('user_id', $userId)->first();

                $primaryResume = Resume::createPrimaryResume($userId, $seekerProfile->id);

                // Gán giá trị mặc định cho các trường nếu cần
                $this->title = ''; // Gán giá trị mặc định
                $this->slug = '';  // Gán giá trị mặc định
                $this->description = ''; // Gán giá trị mặc định
                $this->salary_min = 0; // Gán giá trị mặc định
                $this->position = ''; // Gán giá trị mặc định
                $this->experience = ''; // Gán giá trị mặc định
                $this->academic_level = ''; // Gán giá trị mặc định
                $this->type_of_workplace = ''; // Gán giá trị mặc định
                $this->job_type = ''; // Gán giá trị mặc định
            }
        }

    }

    private function isSeekerProfileComplete($seekerProfile)
    {
        // dd($seekerProfile);
        // Check if all relevant fields in seekerProfile are not empty
        return !empty($seekerProfile->user_id) &&
            !empty($seekerProfile->location_id) &&
            !empty($seekerProfile->phone) &&
            !empty($seekerProfile->birthday) &&
            !empty($seekerProfile->gender) &&
            !empty($seekerProfile->marital_status) &&
            !empty($seekerProfile->introduction) &&            // Giới thiệu bản thân
            !empty($seekerProfile->current_residence) &&       // Chỗ ở hiện tại
            !empty($seekerProfile->working_province) &&        // Tỉnh/thành làm việc
            !empty($seekerProfile->degree) &&                  // Bằng cấp
            !empty($seekerProfile->current_salary) &&          // Mức lương hiện tại
            !empty($seekerProfile->expected_salary_min) &&     // Mức lương mong muốn tối thiểu
            !empty($seekerProfile->expected_salary_max);        // Mức lương mong muốn tối đa
    }


    // edit user info
    public function editFullName()
    {
        $this->validate(['fullName' => 'required|string|max:255']);
        $this->user->update(['full_name' => $this->fullName]);
        session()->flash('message', 'Cập nhật họ tên thành công!');
        $this->toggleEdit(''); // Đóng form sau khi cập nhật
    }

    public function editEmail()
    {
        $this->validate(['email' => 'required|email|max:255']);
        $this->user->update(['email' => $this->email]);
        session()->flash('message', 'Cập nhật email thành công!');
        $this->toggleEdit(''); // Đóng form sau khi cập nhật
    }

    public function editStatus()
    {
        $this->user->update(['is_active' => $this->isActive]);
        session()->flash('message', 'Cập nhật trạng thái thành công!');
        $this->toggleEdit(''); // Đóng form sau khi cập nhật
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:1024', // Giới hạn kích thước tối đa là 1MB
        ]);
    }
    public function uploadAvatar()
    {
        if ($this->avatar) {
            // Lưu avatar vào storage
            $avatarPath = $this->avatar->store('avatars', 'public'); // Lưu vào thư mục avatars trong storage/app/public

            // Cập nhật avatar_url trong bảng users
            $this->user->update(['avatar_url' => $avatarPath]);

            session()->flash('message', 'Cập nhật ảnh đại diện thành công!');
            $this->reset('avatar'); // Reset trường avatar
        }
    }

    //primary resume
    public function editCityId()
    {
        $this->validate(['city_id' => 'required|integer']); // Đảm bảo city_id là một số nguyên

        // Tìm kiếm resume của seeker profile có user_id hiện tại
        $resume = Resume::where('user_id', auth()->id())
            ->where('type', 'primary')
            ->first();

        if ($resume) {
            // Nếu resume đã tồn tại, cập nhật city_id
            $resume->update(['city_id' => $this->city_id]);
            session()->flash(  'message', 'Cập nhật thành phố thành công!');
        } else {
            // Nếu không tồn tại, tạo mới một resume

        }
    }

    public function editCareerId()
    {
        $this->validate(['career_id' => 'required|integer']); // Đảm bảo career_id là một số nguyên

        // Tìm kiếm resume của seeker profile có user_id hiện tại
        $resume = Resume::where('user_id', auth()->id())
            ->where('type', 'primary')
            ->first();

        if ($resume) {
            // Nếu resume đã tồn tại, cập nhật career_id
            $resume->update(['career_id' => $this->career_id]);
            session()->flash('message', 'Cập nhật lĩnh vực nghề nghiệp thành công!');
        } else {
            // Nếu không tồn tại, tạo mới một resume

        }
    }


    public function editJobTitle()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['title' => 'required|string|max:255']);
        $resume->update(['title' => $this->title]);
        session()->flash('message', 'Cập nhật tiêu đề công việc thành công!');
    }

    public function editSlug()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['slug' => 'required|string|max:255']);
        $resume->update(['slug' => $this->slug]);
        session()->flash('message', 'Cập nhật slug thành công!');
    }

    public function editDescription()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['description' => 'required|string']);
        $resume->update(['description' => $this->description]);
        session()->flash('message', 'Cập nhật mô tả thành công!');
    }

    public function editSalaryMin()
    {

        $this->validate(['salary_min' => 'required|numeric']); // Đảm bảo salary_min là một số
        $this->user->update(['salary_min' => $this->salary_min]);
        session()->flash('message', 'Cập nhật mức lương tối thiểu thành công!');
    }

    public function editPosition()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['position' => 'required|string|max:255']);
        $resume->update(['position' => $this->position]);
        session()->flash('message', 'Cập nhật vị trí thành công!');
    }

    public function editExperience()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['experience' => 'required|string|max:255']);
        $resume->update(['experience' => $this->experience]);
        session()->flash('message', 'Cập nhật kinh nghiệm thành công!');
    }

    public function editAcademicLevel()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['academic_level' => 'required|string|max:255']);
        $resume->update(['academic_level' => $this->academic_level]);
        session()->flash('message', 'Cập nhật trình độ học vấn thành công!');
    }

    public function editTypeOfWorkplace()
    {
        $resume = Resume::where('user_id', auth()->id());

        $this->validate(['type_of_workplace' => 'required|string|max:255']);
        $resume->update(['type_of_workplace' => $this->type_of_workplace]);
        session()->flash('message', 'Cập nhật loại nơi làm việc thành công!');
    }

    public function editJobType()
    {
        $resume = Resume::where('user_id', auth()->id());
        $this->validate(['job_type' => 'required|string|max:255']);
        $resume->update(['job_type' => $this->job_type]);
        session()->flash('message', 'Cập nhật loại công việc thành công!');
    }
    // seeker profile update
    public function editIntroduction()
    {
        $this->validate(['introduction' => 'required|string']);

        // Cập nhật giới thiệu bản thân
        $this->resumes->first()->seekerProfile->introduction = $this->introduction;
        $this->resumes->first()->seekerProfile->save();

        // Tắt chế độ chỉnh sửa
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật giới thiệu bản thân thành công.');
    }
    public function editPhone()
    {
        $this->validate(['phone' => 'required|string|max:15']);
        $this->resumes->first()->seekerProfile->phone = $this->phone;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật số điện thoại thành công.');
    }

    public function editBirthday()
    {

        $this->validate(['birthday' => 'required|date']);
        $this->resumes->first()->seekerProfile->birthday = $this->birthday;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật ngày sinh thành công.');
    }

    public function editGender()
    {
        $this->validate(['gender' => 'required|string|in:M,F']);
       $this->resumes->first()->seekerProfile->gender = $this->gender;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật giới tính thành công.');
    }

    public function editMaritalStatus()
    {
        $this->validate(['marital_status' => 'required|string|in:M,S']);
        $this->resumes->first()->seekerProfile->marital_status = $this->marital_status;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật tình trạng hôn nhân thành công.');
    }

    public function editCurrentResidence()
    {
        $this->validate(['current_residence' => 'required|string|max:255']);
        $this->resumes->first()->seekerProfile->current_residence = $this->current_residence;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật chỗ ở hiện tại thành công.');
    }

    public function editWorkingProvince()
    {
        $this->validate(['working_province' => 'required|string|max:255']);
        $this->resumes->first()->seekerProfile->working_province = $this->working_province;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật tỉnh/thành làm việc thành công.');
    }

    public function editDegree()
    {
        $this->validate(['degree' => 'required|string|max:255']);
        $this->resumes->first()->seekerProfile->degree = $this->degree;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật bằng cấp thành công.');
    }

    public function editCurrentSalary()
    {
        $this->validate(['current_salary' => 'required|numeric|min:0']);
        $this->resumes->first()->seekerProfile->current_salary = $this->current_salary;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật mức lương hiện tại thành công.');
    }

    public function editExpectedSalary()
    {
        $this->validate([
            'expected_salary_min' => 'required|numeric|min:0',
            'expected_salary_max' => 'required|numeric|min:0|gte:expected_salary_min',
        ]);
        $this->resumes->first()->seekerProfile->expected_salary_min = $this->expected_salary_min;
        $this->resumes->first()->seekerProfile->expected_salary_max = $this->expected_salary_max;
        $this->resumes->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật mức lương mong muốn thành công.');
    }

    //advanced skills
    public function saveSkills()
    {
        // Validate the inputs
        $this->validate([
            'newSkill' => 'required',
            'newExperience' => 'required',
        ]);
        // Create a new advanced skill
        ResumeAdvancedSkill::create([
            'name' => $this->newSkill,
            'level' => $this->newExperience,
            'resume_id' =>  $this->resumes->first()->id, // Assuming you have the resume ID available
        ]);

        // Reset the input fields
        $this->newSkill = '';
        $this->newExperience = '';

        // Optionally, refresh the list of skills
        $this->skills = ResumeAdvancedSkill::where('resume_id',  $this->resumes->first()->id)->get();
    }

    public function render()
    {

        return view('livewire.candidate.review', [
            'user' => $this->user,
            'resumes' => $this->resumes,
        ]);

    }
}
