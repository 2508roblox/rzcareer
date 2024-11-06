<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $currentTitle }} - RZCareer</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f3f4f6;">
    <div style="width: 90%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; border: 2px solid {{ $statusColor }};">
        <h1 style="color: {{ $statusColor }}; text-align: center; border-bottom: 2px solid {{ $statusColor }}; padding-bottom: 10px;">{{ $currentTitle }}</h1>
        
        <p style="font-size: 16px; line-height: 1.5; color: #333;">Chào <strong style="color: {{ $statusColor }};">{{ $candidateName }}</strong>,</p>

        @if($status == 'scheduled')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">
                Chúng tôi xin thông báo lịch phỏng vấn của bạn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong> đã được sắp xếp.
            </p>
            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0;">
                <h3 style="color: {{ $statusColor }}; margin-top: 0;">Chi tiết buổi phỏng vấn:</h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin: 10px 0;">
                        <strong>Thời gian:</strong> {{ $interviewTime }}
                    </li>
                    <li style="margin: 10px 0;">
                        <strong>Người phỏng vấn:</strong> {{ $interviewerName }}
                    </li>
                </ul>
            </div>
        @elseif($status == 'completed')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">
                Cảm ơn bạn đã tham gia buổi phỏng vấn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong>. 
                Chúng tôi sẽ sớm thông báo kết quả đến bạn.
            </p>
        @elseif($status == 'canceled')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">
                Rất tiếc phải thông báo rằng buổi phỏng vấn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong> đã bị hủy.
                Chúng tôi sẽ liên hệ lại để sắp xếp lịch phỏng vấn mới nếu có thể.
            </p>
        @endif

        <p style="font-size: 16px; line-height: 1.5; color: #555; margin-top: 20px;">
            Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua:
        </p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;">
            Email: <a href="mailto:contact@rzcareer.vn" style="color: {{ $statusColor }};">contact@rzcareer.vn</a><br>
            Hotline: <a href="tel:0899565868" style="color: {{ $statusColor }};">0899.565.868</a>
        </p>
    </div>
</body>
</html>
