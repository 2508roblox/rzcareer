<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'seeker_profile_id',
        'city_id',
        'career_id',
        'title',
        'slug',
        'description',
        'salary_min',
        'position',
        'experience',
        'academic_level',
        'type_of_workplace',
        'job_type',
        'is_active',
        'image_url',
        'file_url',
        'public_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seekerProfile()
    {
        return $this->belongsTo(SeekerProfile::class, 'seeker_profile_id');
    }

    public function city()
    {
        return $this->belongsTo(CommonCity::class, 'city_id');
    }

    public function career()
    {
        return $this->belongsTo(CommonCareer::class, 'career_id');
    }
    public function educationDetails()
    {
        return $this->hasMany(ResumeEducationDetail::class);
    }

    public function certificates()
    {
        return $this->hasMany(ResumeCertificate::class);
    }

    public function advancedSkills()
    {
        return $this->hasMany(ResumeAdvancedSkill::class);
    }
    public function experienceDetails()
    {
        return $this->hasMany(ResumeExperienceDetail::class);
    }

    public function languageSkills()
    {
        return $this->hasMany(ResumeLanguageSkill::class);
    }

    public function postActivities()
    {
        return $this->hasMany(PostActivity::class);
    }

    public function viewedResumes()
    {
        return $this->hasMany(ViewedResume::class);
    }

    public function savedResumes()
    {
        return $this->hasMany(SavedResume::class);
    }
    public static function createPrimaryResume($userId, $seekerProfileId)
    {
        // Kiểm tra xem đã có resume type primary chưa
        $existingResume = self::where('user_id', $userId)
            ->where('type', 'primary')
            ->first();

        // Nếu không có resume type primary, tạo mới
        if (!$existingResume) {
            return self::create([
                'user_id' => $userId,
                'seeker_profile_id' => $seekerProfileId,
                'type' => 'primary',
                // Thêm các trường khác nếu cần thiết
            ]);
        }

        return null; // Hoặc có thể trả về existingResume nếu cần
    }
}
