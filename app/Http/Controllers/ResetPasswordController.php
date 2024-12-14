<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'token.required' => 'Token không hợp lệ',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ]);

        $tokenData = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'Link reset mật khẩu không hợp lệ hoặc đã hết hạn']);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Không tìm thấy tài khoản với email này']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Xóa token sau khi reset password thành công
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        // Chuyển hướng về trang login với thông báo thành công
        return redirect('/site/login')->with('status', 'Mật khẩu đã được đặt lại thành công!');
    }
} 