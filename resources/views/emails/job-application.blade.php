<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f3f4f6;">
    <div
        style="width: 90%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; border: 2px solid {{ $statusColor }};">
        <h1
            style="color: {{ $statusColor }}; text-align: center; padding-bottom: 10px;">
            <img src="https://i.ibb.co/VLCzPcL/Screenshot-2024-12-16-091923-removebg-preview.png" alt=""
                srcset="" style="width: 200px;  ">
        </h1>
        <h1
            style="color: {{ $statusColor }}; text-align: center; border-bottom: 2px solid {{ $statusColor }}; padding-bottom: 10px;">
            Xác Nhận Hồ Sơ Ứng Tuyển</h1>
        <p style="font-size: 16px; line-height: 1.5; color: #333;">Chào <strong
                style="color: {{ $statusColor }};">{{ $candidateName }}</strong>,</p>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">Cảm ơn bạn đã ứng tuyển vào vị trí <strong
                style="color: {{ $statusColor }};">{{ $jobName }}</strong> tại <strong
                style="color: {{ $statusColor }};">{{ $companyName }}</strong>.</p>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">Hồ sơ của bạn đã được tiếp nhận và đang trong quá
            trình xem xét. Chúng tôi sẽ sắp xếp lịch phỏng vấn và thông báo đến bạn trong thời gian sớm nhất.</p>

        <h3 style="color: {{ $statusColor }};">Thông tin công việc</h3>
        <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Tính chất công việc:</strong>
            {{ $typeOfWorkplace }}</p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Vị trí/chức vụ:</strong> {{ $position }}
        </p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Yêu cầu bằng cấp:</strong>
            {{ $academicLevel }}</p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Yêu cầu kinh nghiệm:</strong>
            {{ $experience }}</p>
        <p style="font-size: 16px; line-height: 1.5; color: #555;"><strong>Ngày đăng tuyển:</strong>
            {{ $createdAt }}</p>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">Thời gian ứng tuyển: <strong
                style="color: {{ $statusColor }};">{{ $sentAt }}</strong></p>

        <p style="font-size: 16px; line-height: 1.5; color: #555;">Chúc bạn may mắn!</p>
        <div style="text-align: center; margin-top: 20px; font-size: 14px; color: #888;">
            <p>Cảm ơn bạn đã quan tâm đến <strong style="color: {{ $statusColor }};">RZCareer</strong>!</p>
        </div>
    </div>
</body>
