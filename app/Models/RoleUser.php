<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    // Không cần khai báo bảng nếu tên bảng không theo quy tắc chuẩn của Laravel

    protected $table = 'role_users';

    public $timestamps = false;

    // Không cần khai báo `$primaryKey` vì đã sử dụng composite key

    // Đánh dấu các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'user_id',
        'role_id',
        'id'
    ];

    // Định nghĩa quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Định nghĩa quan hệ với Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public static function find($userId, $roleId)
    {
        return self::where('user_id', $userId)
                   ->where('role_id', $roleId)
                   ->first();
    }
}
