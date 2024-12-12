<div>

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets_livewire/logo-light.svg" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

@livewireStyles

<body>
    <div class="loading-screen" id="loadingScreen" wire:navigating>
        <div class="loading-spinner"></div>
    </div>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Loading Screen Styles */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 1);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensure it is on top of other content */
        }

        .loading-spinner {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

 <style>
.toast-info .toast-message {
    display: flex;
    align-items: center;
}
.toast-info .toast-message i {
    margin-right: 10px;
}
.toast-info .toast-message .notification-content {
    display: flex;
    flex-direction: row;
    align-items: center;
}
#toast-container>.toast {
    background-image:  none !important;
}
#toast-container {
    
    width: 23rem !important;

}


.toast-info {
    background: #3498db !important;

}
.toast-info  {
    display: block;
    background: white !important;
    color: black;
}
.toast.toast-info {
    color: black !important;
    width: 100% !important;

}
.toast-notification {
    display: flex;
    align-items: flex-start;
    background-color: #fff;
    border-left: 5px solid #007bff; /* Màu sắc trạng thái */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    font-family: Arial, sans-serif;
    color: #333;
}

.toast-icon {
    flex-shrink: 0;
    font-size: 24px;
    color: #007bff; /* Màu sắc icon */
    margin-right: 10px;
}

.toast-content {
    display: flex;
    flex-direction: column;
}

.toast-name,
.toast-job,
.toast-status {
    margin: 5px 0;
}

.toast-name strong,
.toast-job strong,
.toast-status strong {
    color: #555;
}
.toast-title {
    display: none;
}
.toast.toast-info {
    display: block;
    background: none !important;
    box-shadow: none !important;
    border: none !important;
    padding: 0 !important;
    opacity: 1 !important;
}
.toast-info .toast-message {
    display: block !important;
}

.toast-header {
    display: flex
;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    gap: 3rem !important;
}

.toast-title-1 {
    flex: 1;
}

.toast-time {
    font-size: 12px;

    
    color: #808080a3;
    font-weight: 100;
    font-size: .7rem;

}
.toast-notification {
    flex-direction: column;
}
</style>


{{-- toast --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{{-- toast --}}




    <script>
        document.addEventListener('livewire:navigated', function() {
            // Re-enable scroll after loading
            document.getElementById('loadingScreen').remove();
        });

    </script>
    
    {{ $slot }}

{{-- pusher --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Biến này được lấy từ backend Laravel, bạn cần khai báo trong view Blade
        const currentUserId = {{ auth()->id() }}; // Hoặc user ID khác được truyền vào
    
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('bfb528bfe72756d0a69e', {
            cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('notification');
        channel.bind('test.notification', function(data) {
            console.log(data.user_id , currentUserId)
            if (data.user_id == currentUserId) { // Kiểm tra user_id trùng khớp
                if (data.job_name && data.status) {
                    // Map trạng thái thành thông báo cụ thể
                    let statusMessages = {
                        'Chờ xác nhận': 'Công việc đang chờ xác nhận.',
                        'Đã liên hệ': 'Đã liên hệ với ứng viên.',
                        'Đã test': 'Ứng viên đã hoàn thành bài test.',
                        'Đã phỏng vấn': 'Ứng viên đã tham gia phỏng vấn.',
                        'Trúng tuyển': 'Ứng viên đã được trúng tuyển!',
                        'Không trúng tuyển': 'Ứng viên không trúng tuyển.'
                    };
    
                    let statusMessage = statusMessages[data.status] || 'Trạng thái không xác định.';
                    
                    toastr.info(
                        `<div class="toast-notification">
                            <div class="toast-header">
                                <div class="toast-title-1">
                                    <svg style="width: 19px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#0672fe">
                                        <path d="M8.35179 20.2418C9.19288 21.311 10.5142 22 12 22C13.4858 22 14.8071 21.311 15.6482 20.2418C13.2264 20.57 10.7736 20.57 8.35179 20.2418Z" fill="#2e5fff"></path>
                                        <path d="M18.7491 9V9.7041C18.7491 10.5491 18.9903 11.3752 19.4422 12.0782L20.5496 13.8012C21.5612 15.3749 20.789 17.5139 19.0296 18.0116C14.4273 19.3134 9.57274 19.3134 4.97036 18.0116C3.21105 17.5139 2.43882 15.3749 3.45036 13.8012L4.5578 12.0782C5.00972 11.3752 5.25087 10.5491 5.25087 9.7041V9C5.25087 5.13401 8.27256 2 12 2C15.7274 2 18.7491 5.13401 18.7491 9Z" fill="#2e5fff"></path>
                                    </svg>
                                    Thông báo ứng tuyển
                                </div>
                                <div class="toast-time" id="toast-time">vừa xong</div>
                            </div>
                            <div class="toast-body">
                                <div class="toast-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="toast-content">
                                    <div class="toast-job">
                                        <strong>Công việc:</strong> <span id="toast-job-name">${data.job_name}</span>
                                    </div>
                                    <div class="toast-status">
                                        <strong>Trạng thái:</strong> <span id="toast-status">${statusMessage}</span>
                                    </div>
                                </div>
                            </div>
                        </div>`,
                        'Thông báo trạng thái công việc',
                        {
                            closeButton: true,
                            progressBar: true,
                            timeOut: 15000, // Hiển thị thông báo trong 15 giây
                            positionClass: 'toast-top-right',
                            enableHtml: true
                        }
                    );
                } else {
                    console.error('Dữ liệu nhận được không hợp lệ:', data);
                }
            }
        });
    </script>
    
    

{{-- pusher --}}

</body>

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

</html>

</div>