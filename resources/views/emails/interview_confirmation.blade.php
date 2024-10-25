<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $currentTitle  }} - RZCareer</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f3f4f6;">
    <div style="width: 90%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; border: 2px solid {{ $statusColor }};">
        <h1 style="color: {{ $statusColor }}; text-align: center; border-bottom: 2px solid {{ $statusColor }}; padding-bottom: 10px;">{{ $currentTitle  }}</h1>
        <p style="font-size: 16px; line-height: 1.5; color: #333;">Chào <strong style="color: {{ $statusColor }};">{{ $candidateName }}</strong>,</p>


        @if($status == 'scheduled')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">Chúng tôi rất vui khi thông báo rằng bạn đã được lên lịch phỏng vấn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong>.</p>
            <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Thông tin phỏng vấn:</strong></p>
        @elseif($status == 'completed')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">Chúc mừng bạn đã hoàn thành phỏng vấn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong>.</p>
        @elseif($status == 'canceled')
            <p style="font-size: 16px; line-height: 1.5; color: #555;">Rất tiếc, phỏng vấn cho vị trí <strong style="color: {{ $statusColor }};">{{ $jobName }}</strong> đã bị hủy.</p>
        @endif

        @if($status == 'scheduled')
            <ul style="list-style-type: none; padding: 0;">
                <li style="background-color: #E8F6FD; padding: 10px; margin: 10px 0; border-radius: 5px;">
                    <strong>Thời gian:</strong> <span style="color: #333;">{{ $interviewTime }}</span>
                </li>
                <li style="background-color: #E8F6FD; padding: 10px; margin: 10px 0; border-radius: 5px;">
                    <strong>Người phỏng vấn:</strong> <span style="color: #333;">{{ $interviewerName }}</span>
                </li>
            </ul>
        @endif

        <p style="font-size: 16px; line-height: 1.5; color: #555;">Chúc bạn may mắn!</p>
        <div style="text-align: center; margin-top: 20px; font-size: 14px; color: #888;">
            <p>Cảm ơn bạn đã quan tâm đến <strong style="color: {{ $statusColor }};">RZCareer</strong>!</p>
        </div>
    </div>
</body>
</html>
