<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thư gửi xác nhận người dùng RZCareer</title>
  </head>
  <body style="font-family: 'Poppins', Arial, sans-serif">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" style="padding: 20px">
          <table
            class="content"
            width="600"
            border="0"
            cellspacing="0"
            cellpadding="0"
            style="border-collapse: collapse; border: 1px solid #cccccc"
          >
            <!-- Header -->
            <tr>
              <td
                class="header"
                style="
                  background-color: #ececec;
                  padding: 40px;
                  text-align: center;
                  color: #345c72;
                  font-weight: 600;
                  font-size: 24px;
                "
              >
                <img
                  src="{{ $logoUrl}}"
                  alt="RZCareer Logo"
                  style="max-width: 150px; margin-bottom: 20px"
                />
                <br />
                XÁC THỰC NGƯỜI DÙNG RZCAREER
              </td>
            </tr>

            <!-- Body -->
            <tr>
              <td
                class="body"
                style="
                  padding: 40px;
                  text-align: left;
                  font-size: 16px;
                  line-height: 1.6;
                "
              >
                Xin chào, {{ $user->full_name }}! <br />
                Cảm ơn bạn đã đăn ký tài khoản tại RZCareer
                <br /><br />
                <p>Để hoàn tất quá trình đăng ký và kích hoạt tài khoản của bạn,
                    vui lòng xác thực email bằng cách nhấp vào liên kết dưới đây:</p>
              </td>
            </tr>

            <!-- Call to action Button -->
            <tr>
              <td style="padding: 0px 40px 0px 40px; text-align: center">
                <!-- CTA Button -->
                <table cellspacing="0" cellpadding="0" style="margin: auto">
                  <tr>
                    <td
                      align="center"
                      style="
                        background-color: #345c72;
                        padding: 10px 20px;
                        border-radius: 5px;
                      "
                    >
                      <a
                        href="{{ $verifycationUrl }}"
                        target="_blank"
                        style="
                          color: #ffffff;
                          text-decoration: none;
                          font-weight: bold;
                          padding: 12px 20px;
                          font-size: 20px;
                        "
                        >Xác minh email</a
                      >
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td
                class="body"
                style="
                  padding: 40px;
                  text-align: left;
                  font-size: 16px;
                  line-height: 1.6;
                "
              >
                Nếu bạn không thực hiện hành động này, vui lòng bỏ qua email
                này.
              </td>
            </tr>
            <!-- Footer -->
            <tr>
              <td
                class="footer"
                style="
                  background-color: #333333;
                  padding: 40px;
                  text-align: center;
                  color: white;
                  font-size: 14px;
                "
              >
                Copyright &copy; 2024 | RZCareer
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
