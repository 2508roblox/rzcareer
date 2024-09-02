<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 class PermissionRole extends Model
 {
    use HasFactory;
     // Không cần khai báo bảng nếu tên bảng không theo quy tắc chuẩn của Laravel
     protected $table = 'permission_roles';
     public $timestamps = false;

     // Đánh dấu các thuộc tính có thể gán hàng loạt
     protected $fillable = [
         'role_id',
         'permission_id',
     ];

     // Định nghĩa quan hệ với Role
     public function role()
     {
         return $this->belongsTo(Role::class, 'role_id');
     }

     // Định nghĩa quan hệ với Permission
     public function permission()
     {
         return $this->belongsTo(Permission::class, 'permission_id');
     }
 }
