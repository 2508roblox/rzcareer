<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Chào {{ $user->full_name }}</h1>
    <p>Cảm ơn bạn đã đăng ký tài khoản với chúng tôi.</p>
    <p>Vui lòng nhấn vào nút bên dưới để xác minh email của bạn:</p>
    <a href="{{ $verifycationUrl }}" style="padding: 10px 20px; background: #1D4ED8; color: white; text-decoration: none; border-radius: 5px;">Xác minh email</a>
    <p>Nếu bạn không thực hiện hành động này, vui lòng bỏ qua email này.</p>
    <p>Trân trọng,<br>Đội ngũ hỗ trợ</p>
</body>
</html>
