<?php

namespace App\Livewire\Candidate;

use App\Models\Resume;
use Livewire\Component;
use App\Models\CommonCity;
use App\Models\CommonCareer;
use App\Models\SeekerProfile;
use App\Models\ResumeCertificate;
use App\Models\ResumeAdvancedSkill;
use App\Models\ResumeLanguageSkill;
use Illuminate\Support\Facades\Auth;
use App\Models\ResumeEducationDetail;
use App\Models\ResumeExperienceDetail;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ReviewUploadResume extends Component
{
    use WithFileUploads;
    public $user;
    public $resume;
    public $resumeDataPercentage; // Variable to hold percentage of resume with data
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




    public $experiences = []; // Mảng chứa các kinh nghiệm làm việc
    public $newCompany = ''; // Tên công ty mới
    public $newJobTitle = ''; // Chức vụ mới
    public $newStartMonth = ''; // Tháng bắt đầu mới
    public $newStartYear = ''; // Năm bắt đầu mới
    public $newEndMonth = ''; // Tháng kết thúc mới (nếu có)
    public $newEndYear = ''; // Năm kết thúc mới (nếu có)
    public $newDescription = ''; // Mô tả công việc
    public $currentJob = false; // Công việc hiện tại
    public $resumeId; // ID của hồ sơ (resume)
    public $editingExperienceId = null;

    //experience



    public $educations = []; // Danh sách thông tin học tập
    public $degree_name; // Tên bằng cấp
    public $major; // Chuyên ngành
    public $training_place; // Nơi đào tạo
    public $completed_date; // Năm tốt nghiệp
    public $start_date; // Mô tả quá trình học tập
    public $education_description; // Mô tả quá trình học tập
    public $current; // Trạng thái đang học

    public $editingEducationId = null;

    //education






    public $cert_name;
    public $resume_id;
    public $cert_training_place;
    public $cert_start_date;
    public $cert_expiration_date;
    public $cert_description;
    public $isEdit = false; // Để xác định chế độ sửa hay thêm
    public $currentCertificateId; // ID của chứng chỉ hiện tại
    // certification





    public $languages = [];
    public $selectedLanguage; // Biến để lưu ngôn ngữ được chọn
    public $language_level = ''; // Cấp độ ngôn ngữ, nếu cần
    //lang
    public function toggleEdit($field)
    {
        if ($this->isEditing === $field) {
            $this->isEditing = ''; // Tắt chỉnh sửa nếu đang chỉnh sửa cùng một trường
        } else {
            $this->isEditing = $field; // Chỉnh sửa trường mới
        }
    }
    public function mount($resume_id)
    {
        $this->resume_id = $resume_id;
        // Lấy bản ghi resume cùng các quan hệ liên quan

        // Get the authenticated user
        $this->user = Auth::user();

        // Initialize $a
        $this->a = 0; // Start with 0

        // Load resume and their relationships
        if ($this->user) {
            $this->resume = Resume::with([
                'educationDetails',
                'certificates',
                'experienceDetails',
                'advancedSkills',
                'languageSkills',
                'seekerProfile'
            ])->findOrFail($resume_id);

            // Check advancedSkills

// Kiểm tra xem advancedSkills có ít nhất một item
if ($this->resume->advancedSkills->isNotEmpty()) {
    $this->a = 1; // Đặt a là 1 nếu advancedSkills tồn tại
}

// Tăng a thêm 1 nếu educationDetails có ít nhất một item
if ($this->resume->educationDetails->isNotEmpty()) {
    $this->a += 1; // Tăng a thêm 1
}

// Tăng a thêm 1 nếu experienceDetails có ít nhất một item
if ($this->resume->experienceDetails->isNotEmpty()) {
    $this->a += 1; // Tăng a thêm 1
}

// Tăng a thêm 1 nếu seekerProfile không có trường nào rỗng
if ($this->isSeekerProfileComplete($this->resume->seekerProfile)) {
    $this->a += 1; // Tăng a thêm 1
}

            // Calculate the percentage of resume with data (if needed)
            // $this->resumeDataPercentage = ...


            //primary resume
            $this->cities = CommonCity::all();
            $this->careers = CommonCareer::all();

            // init primary resume data
            $userId = auth()->id(); // Lấy ID người dùng hiện tại
            $seekerProfile = SeekerProfile::where('user_id', $userId)->first();

            // Kiểm tra xem đã có resume type primary chưa
            $secondary = Resume::find($resume_id);


            if ($secondary) {
                // Nếu đã có resume, gán giá trị cho các trường
                $this->title = $secondary->title;
                $this->slug = $secondary->slug;
                $this->city_id = $secondary->city_id;
                $this->career_id = $secondary->career_id;
                $this->description = $secondary->description;
                $this->salary_min = $secondary->salary_min;
                $this->position = $secondary->position;
                $this->experience = $secondary->experience;
                $this->academic_level = $secondary->academic_level;
                $this->type_of_workplace = $secondary->type_of_workplace;
                $this->job_type = $secondary->job_type;

            } else {
                // Nếu không có resume, tạo mới
            $seekerProfile = SeekerProfile::where('user_id', $userId)->first();

                $secondary = Resume::createsecondary($userId, $seekerProfile->id);

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


            //experience
            $this->loadExperiences(); // Load danh sách kinh nghiệm làm việc
            //languages
            $this->languages = ResumeLanguageSkill::where('resume_id', $this->resume_id)
            ->get(['language']) // Giả sử bạn chỉ cần cột 'language'
            ->toArray();

        }

    }
    public function loadExperiences()
    {
        $this->experiences = ResumeExperienceDetail::where('resume_id', $this->resume_id)->get();
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
        $resume = Resume::find( $this->resume_id);

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
        $resume = Resume::find( $this->resume_id);

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
        $resume = Resume::find( $this->resume_id);

        $this->validate(['title' => 'required|string|max:255']);
        $resume->update(['title' => $this->title]);
        session()->flash('message', 'Cập nhật tiêu đề công việc thành công!');
    }

    public function editSlug()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['slug' => 'required|string|max:255']);
        $resume->update(['slug' => $this->slug]);
        session()->flash('message', 'Cập nhật slug thành công!');
    }

    public function editDescription()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['description' => 'required|string']);
        $resume->update(['description' => $this->description]);
        session()->flash('message', 'Cập nhật mô tả thành công!');
    }

    public function editSalaryMin()
    {

        $this->validate(['salary_min' => 'required|numeric']); // Đảm bảo salary_min là một số
        $resume = Resume::find($this->resume_id);

        // Kiểm tra xem resume có tồn tại không
        if ($resume) {
            // Cập nhật mức lương tối thiểu
            $resume->update(['salary_min' => $this->salary_min]);

            // Thông báo thành công
            session()->flash('message', 'Cập nhật mức lương tối thiểu thành công!');
        } else {
            // Thông báo nếu không tìm thấy resume
            session()->flash('error', 'Không tìm thấy thông tin hồ sơ!');
        }
    }

    public function editPosition()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['position' => 'required|string|max:255']);
        $resume->update(['position' => $this->position]);
        session()->flash('message', 'Cập nhật vị trí thành công!');
    }

    public function editExperience()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['experience' => 'required|string|max:255']);
        $resume->update(['experience' => $this->experience]);
        session()->flash('message', 'Cập nhật kinh nghiệm thành công!');
    }

    public function editAcademicLevel()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['academic_level' => 'required|string|max:255']);
        $resume->update(['academic_level' => $this->academic_level]);
        session()->flash('message', 'Cập nhật trình độ học vấn thành công!');
    }

    public function editTypeOfWorkplace()
    {
        $resume = Resume::find( $this->resume_id);

        $this->validate(['type_of_workplace' => 'required|string|max:255']);
        $resume->update(['type_of_workplace' => $this->type_of_workplace]);
        session()->flash('message', 'Cập nhật loại nơi làm việc thành công!');
    }

    public function editJobType()
    {
        $resume = Resume::find( $this->resume_id);
        $this->validate(['job_type' => 'required|string|max:255']);
        $resume->update(['job_type' => $this->job_type]);
        session()->flash('message', 'Cập nhật loại công việc thành công!');
    }
    // seeker profile update
    public function editIntroduction()
    {
        $this->validate(['introduction' => 'required|string']);

        // Cập nhật giới thiệu bản thân
        $this->resume->first()->seekerProfile->introduction = $this->introduction;
        $this->resume->first()->seekerProfile->save();

        // Tắt chế độ chỉnh sửa
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật giới thiệu bản thân thành công.');
    }
    public function editPhone()
    {
        $this->validate(['phone' => 'required|string|max:15']);
        $this->resume->first()->seekerProfile->phone = $this->phone;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật số điện thoại thành công.');
    }

    public function editBirthday()
    {

        $this->validate(['birthday' => 'required|date']);
        $this->resume->first()->seekerProfile->birthday = $this->birthday;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật ngày sinh thành công.');
    }

    public function editGender()
    {
        $this->validate(['gender' => 'required|string|in:M,F']);
       $this->resume->first()->seekerProfile->gender = $this->gender;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật giới tính thành công.');
    }

    public function editMaritalStatus()
    {
        $this->validate(['marital_status' => 'required|string|in:M,S']);
        $this->resume->first()->seekerProfile->marital_status = $this->marital_status;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật tình trạng hôn nhân thành công.');
    }

    public function editCurrentResidence()
    {
        $this->validate(['current_residence' => 'required|string|max:255']);
        $this->resume->first()->seekerProfile->current_residence = $this->current_residence;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật chỗ ở hiện tại thành công.');
    }

    public function editWorkingProvince()
    {
        $this->validate(['working_province' => 'required|string|max:255']);
        $this->resume->first()->seekerProfile->working_province = $this->working_province;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật tỉnh/thành làm việc thành công.');
    }

    public function editDegree()
    {
        $this->validate(['degree' => 'required|string|max:255']);
        $this->resume->first()->seekerProfile->degree = $this->degree;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật bằng cấp thành công.');
    }

    public function editCurrentSalary()
    {
        $this->validate(['current_salary' => 'required|numeric|min:0']);
        $this->resume->first()->seekerProfile->current_salary = $this->current_salary;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật mức lương hiện tại thành công.');
    }

    public function editExpectedSalary()
    {
        $this->validate([
            'expected_salary_min' => 'required|numeric|min:0',
            'expected_salary_max' => 'required|numeric|min:0|gte:expected_salary_min',
        ]);
        $this->resume->first()->seekerProfile->expected_salary_min = $this->expected_salary_min;
        $this->resume->first()->seekerProfile->expected_salary_max = $this->expected_salary_max;
        $this->resume->first()->seekerProfile->save();
        $this->isEditing = '';
        session()->flash('message', 'Cập nhật mức lương mong muốn thành công.');
    }

    //advanced skills
    public function saveSkills()
    {
        // Validate the inputs
        // $this->validate([
        //     'newSkill' => 'required',
        //     'newExperience' => 'required',
        // ]);
        // Create a new advanced skill
        ResumeAdvancedSkill::create([
            'name' => $this->newSkill,
            'level' => $this->newExperience,
            'resume_id' =>  $this->resume_id, // Assuming you have the resume ID available
        ]);

        // Reset the input fields
        $this->newSkill = '';
        $this->newExperience = '';

        // Optionally, refresh the list of skills
        $this->skills = ResumeAdvancedSkill::where('resume_id',  $this->resume_id)->get();
    }




    public function saveExperience()
    {
        // $this->validate();

        // Xử lý ngày bắt đầu và ngày kết thúc
        $startDate = "{$this->newStartYear}-{$this->newStartMonth}-01";
        $endDate = $this->currentJob ?  now()->format('Y-m-d') : "{$this->newEndYear}-{$this->newEndMonth}-01";

        // Tạo mới một kinh nghiệm làm việc
        if ($this->editingExperienceId) {
            $experience = ResumeExperienceDetail::find($this->editingExperienceId);

            // Cập nhật thông tin Experience
            $experience->update([
                'company_name' => $this->newCompany,
                'job_name' => $this->newJobTitle,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'description' => $this->newDescription,
            ]);
        } else {
            // Tạo mới một kinh nghiệm làm việc
            ResumeExperienceDetail::create([
                'resume_id' => $this->resume_id,
                'company_name' => $this->newCompany,
                'job_name' => $this->newJobTitle,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'description' => $this->newDescription,
            ]);
        }
        // Reset các input
        $this->newCompany = '';
        $this->newJobTitle = '';
        $this->newStartMonth = '';
        $this->newStartYear = '';
        $this->newEndMonth = '';
        $this->newEndYear = '';
        $this->newDescription = '';
        $this->currentJob = false;

        // Cập nhật danh sách kinh nghiệm làm việc
        $this->loadExperiences();
    }
    public function editWorkingExperience($id)
{
    $experience = ResumeExperienceDetail::find($id);

    $this->editingExperienceId = $id; // Gán ID để biết đây là chế độ sửa
    $this->newCompany = $experience->company_name;
    $this->newJobTitle = $experience->job_name;
    $this->newStartMonth = date('m', strtotime($experience->start_date));
    $this->newStartYear = date('Y', strtotime($experience->start_date));
    $this->newEndMonth = date('m', strtotime($experience->end_date));
    $this->newEndYear = date('Y', strtotime($experience->end_date));
    $this->newDescription = $experience->description;
    $this->currentJob = is_null($experience->end_date); // Nếu không có ngày kết thúc thì công việc đang làm
}
public function deleteExperience($experienceId)
{
    // Tìm và xoá kinh nghiệm làm việc
    $experience = ResumeExperienceDetail::findOrFail($experienceId);
    $experience->delete();

    // Cập nhật lại danh sách kinh nghiệm sau khi xóa
    $this->loadExperiences();

    // Hiển thị thông báo thành công (tuỳ chọn)
    session()->flash('message', 'Kinh nghiệm làm việc đã được xoá thành công.');
}









public function loadEducations()
{
    $this->educations = ResumeEducationDetail::all(); // Tải tất cả thông tin học tập
}

public function saveEducation()
{
    // $this->validate([
    //     'degree_name' => 'required|string|max:255',
    //     'major' => 'required|string|max:255',
    //     'training_place' => 'required|string|max:255',
    //     'completed_date' => 'required|integer',
    //     'description' => 'nullable|string',
    // ]);
    if ($this->editingEducationId) {
        // Cập nhật bản ghi
        $education = ResumeEducationDetail::find($this->editingEducationId);
        $education->degree_name = $this->degree_name;
        $education->completed_date = $this->completed_date;
        $education->major = $this->major;
        $education->start_date = $this->start_date;
        $education->training_place = $this->training_place;
        $education->description = $this->education_description;
        $education->save();

        session()->flash('message', 'Cập nhật thành công!');
    } else {
    ResumeEducationDetail::create([
        'resume_id' => $this->resume_id, // Cần thay đổi ID theo ngữ cảnh của bạn
        'degree_name' => $this->degree_name,
        'major' => $this->major,
        'training_place' => $this->training_place,
        'start_date' => $this->start_date,
        'completed_date' => $this->completed_date,
        'description' => $this->education_description,
    ]);
    session()->flash('message', 'Thêm mới thành công!');
}

    // Reset các biến
    $this->reset(['degree_name', 'major', 'training_place', 'completed_date', 'description', 'current']);

    // Tải lại danh sách
    $this->loadEducations();

    // Hiển thị thông báo thành công
    // session()->flash('message', 'Thông tin học tập đã được lưu thành công.');
}

public function editEducation($id)
{
    $this->editingEducationId = $id;

    // Lấy thông tin của education từ database
    $education = ResumeEducationDetail::find($id);
    if ($education) {
        $this->degree_name = $education->degree_name;
        $this->completed_date = $education->completed_date;
        $this->start_date = $education->start_date;
        $this->major = $education->major;
        $this->training_place = $education->training_place;
        $this->education_description = $education->description;
    }

    // Hiển thị modal
    // $this->dis('showModal');
}

public function deleteEducation($id)
{
    // Xác nhận trước khi xóa
    ResumeEducationDetail::destroy($id);
    $this->loadEducations();


}
public function editCertificate($id)
{
    $this->isEdit = true;
    $certificate = ResumeCertificate::find($id);
    $this->currentCertificateId = $certificate->id;
    $this->cert_name = $certificate->name;
    $this->cert_training_place = $certificate->training_place;
    $this->cert_start_date = $certificate->start_date->format('Y-m-d');
    $this->cert_expiration_date = $certificate->expiration_date ? $certificate->expiration_date->format('Y-m-d') : null;
    $this->cert_description = $certificate->description;

    // $this->dispatchBrowserEvent('open-modal');
}
public function updateCertificate()
{
    // $this->validate([
    //     'cert_name' => 'required|string|max:255',
    //     'cert_training_place' => 'required|string|max:255',
    //     'cert_start_date' => 'required|date',
    //     'cert_expiration_date' => 'nullable|date|after_or_equal:cert_start_date',
    //     'cert_description' => 'nullable|string',
    // ]);

    $certificate = ResumeCertificate::find($this->currentCertificateId);
    $certificate->update([
        'name' => $this->cert_name,
        'training_place' => $this->cert_training_place,
        'start_date' => $this->cert_start_date,
        'expiration_date' => $this->cert_expiration_date,
        'description' => $this->cert_description,
    ]);

    // Reset biến và đóng modal
    $this->reset(['cert_name', 'cert_training_place', 'cert_start_date', 'cert_expiration_date', 'cert_description', 'isEdit', 'currentCertificateId']);
    // $this->dispatchBrowserEvent('close-modal');
}
public function deleteCertificate($id)
{
    ResumeCertificate::destroy($id);
    // $this->dispatchBrowserEvent('certificate-deleted'); // Thông báo xóa thành công
}
public function saveCertificate()
{

    ResumeCertificate::create([
        'resume_id' => $this->resume_id,
        'name' => $this->cert_name,
        'training_place' => $this->cert_training_place,
        'start_date' => $this->cert_start_date,
        'expiration_date' => $this->cert_expiration_date,
        'description' => $this->cert_description,
    ]);

    // Reset các biến sau khi lưu
    $this->reset(['cert_name', 'cert_training_place', 'cert_start_date', 'cert_expiration_date', 'cert_description']);

    // Đóng modal (nếu bạn đang sử dụng Bootstrap modal)
    // $this->dispatchBrowserEvent('close-modal');
}

public function createLanguageSkill()
    {
        // Kiểm tra nếu không có ngôn ngữ được chọn hoặc không có level nhập vào
        // if (empty($this->selectedLanguage) || empty($this->languageLevel)) {
        //     session()->flash('error', 'Vui lòng chọn ngôn ngữ và nhập mức độ thành thạo.');
        //     return;
        // }
        // Lưu từng ngôn ngữ với level vào database
            ResumeLanguageSkill::create([
                'resume_id' => $this->resume_id,
                'language' => $this->selectedLanguage,
                'level' => $this->language_level,
            ]);


        // Xóa các giá trị để reset modal
        $this->language_level = '';
        $this->selectedLanguage  ;
        session()->flash('message', 'Kỹ năng ngôn ngữ đã được lưu thành công.');
    }
    public function deleteLanguageSkill($skillId)
    {
        // Xóa kỹ năng ngôn ngữ
        ResumeLanguageSkill::destroy($skillId);

        // Cập nhật lại danh sách ngôn ngữ
        // $this->languages = ResumeLanguageSkill::where('resume_id', $this->resume_id)
        //     ->with(relations: 'language')
        //     ->get()
        //     ->map(function ($skill) {
        //         return [
        //             'id' => $skill->language->id,
        //             'title' => $skill->language->title,
        //         ];
        //     })
        //     ->toArray();

        session()->flash('message', 'Kỹ năng ngôn ngữ đã được xóa thành công.');
    }
    public function render()
    {
        return view('livewire.candidate.review-upload-resume', [
            'user' => $this->user,
            'resume' => $this->resume,
        ]);
    }
}
