<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu - RZCareer</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f3f4f6;">
    <div style="width: 90%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; border: 2px solid #2f8cba;">
        <h1 style="color: #2f8cba; text-align: center; border-bottom: 2px solid #2f8cba; padding-bottom: 10px;">Đặt lại mật khẩu</h1>
        
        <p style="font-size: 16px; line-height: 1.5; color: #333;">Xin chào,</p>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">
            Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn trên RZCareer.
        </p>

        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0;">
            <p style="font-size: 16px; line-height: 1.5; color: #555;">
                Vui lòng click vào nút bên dưới để đặt lại mật khẩu của bạn:
            </p>
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ route('password.reset', $token) }}" 
                   style="background-color: #2f8cba; 
                          color: white; 
                          padding: 12px 25px; 
                          text-decoration: none; 
                          border-radius: 5px; 
                          display: inline-block;
                          font-weight: bold;">
                    Đặt lại mật khẩu
                </a>
            </div>
            <p style="font-size: 14px; color: #666; margin-top: 15px;">
                Link đặt lại mật khẩu này sẽ hết hạn sau 60 phút.
            </p>
        </div>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">
            Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua email này.
        </p>

        <p style="font-size: 16px; line-height: 1.5; color: #555; margin-top: 20px;">
            Nếu bạn gặp khó khăn khi click vào nút "Đặt lại mật khẩu", vui lòng copy và paste đường link sau vào trình duyệt của bạn:
        </p>
        <p style="font-size: 14px; line-height: 1.5; color: #666; word-break: break-all;">
            {{ route('password.reset', $token) }}
        </p>

        <p style="font-size: 16px; line-height: 1.5; color: #555; margin-top: 20px;">
            Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua:
        </p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;">
            Email: <a href="mailto:contact@rzcareer.vn" style="color: #2f8cba;">contact@rzcareer.vn</a><br>
            Hotline: <a href="tel:0899565868" style="color: #2f8cba;">0899.565.868</a>
        </p>
    </div>
</body>
</html> 