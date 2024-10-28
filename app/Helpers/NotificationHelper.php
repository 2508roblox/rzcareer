<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Events\PaymentNotification;

class NotificationHelper
{
    /**
     * Ghi nhận hoạt động vào bảng ActivityHistory
     *
     * @param string $activityMessage
     * @return void
     */
  

    /**
     * Gửi thông báo qua Telegram cho tất cả admin
     *
     * @param string $telegramMessage
     * @return void
     */
   

    /**
     * Gửi thông báo sự kiện qua Livewire event
     *
     * @param string $eventType
     * @param string $eventContent
     * @return void
     */
    public static function sendLivewireEventNotification($eventType, $eventContent, $user_id = null)
    {
        event(new PaymentNotification([
            'type' => $eventType,
            'user' => $user_id ?? Auth::id(), // Nếu $user_id là null, sử dụng Auth::id()
            'content' => $eventContent,
        ]));
    }
}