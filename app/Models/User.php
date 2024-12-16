<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Resume;
use App\Models\UserLog;
use App\Models\RoleUser;
use App\Models\Feedback;
use App\Models\Permission;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasName

{



    use HasFactory, Notifiable, HasRoles, HasPanelShield; // HasPanelShield tự động gán, xóa role cho user khi tạo hoặc xóa
                                                          // tạo observer để gán role khi có event
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'password', 'last_login', 'is_superuser', 'is_staff', 'is_active',
        'full_name', 'email', 'avatar_url', 'avatar_public_id',
        'email_notification_active', 'sms_notification_active',
        'has_company', 'is_verify_email', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getFilamentName(): string
    {
        return "{$this->full_name} ";
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }


    public function userLogs()
    {
        return $this->hasMany(UserLog::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');

    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function canAccessAdminPanel(): bool
    {
        return !$this->roles()->count() === 0;
    }

    public function canAccessRecruiterPanel(): bool
    {
        return $this->has_company === 1;
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
