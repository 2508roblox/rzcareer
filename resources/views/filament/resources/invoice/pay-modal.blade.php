<div>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Quét mã QR để thanh toán') }}
    </h2>

    <div class="mt-4 flex justify-center">
        <img src="https://vietqr.co/api/generate/mb/104567890/VIETQR.CO/{{ (int)$totalPrice }}/{{ $invoiceCode }}?style=2&logo=1&isMask=1&bg=61" alt="" srcset="">
    </div>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Vui lòng quét mã QR bằng ứng dụng ngân hàng của bạn để hoàn tất thanh toán.') }}
    </p>

    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Mã hóa đơn: ') }} {{ $invoiceCode }}
    </p>

    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Số tiền: ') }} {{ $totalPrice }}
    </p>
</div>
