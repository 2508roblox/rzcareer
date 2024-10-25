<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-6">
        {{ __('Quét mã QR để thanh toán') }} {{ $status }}
    </h2>

    <div class="flex justify-center mb-6">
        <img src="https://vietqr.co/api/generate/mb/104567890/VIETQR.CO/{{ (int)$totalPrice }}/{{ $invoiceCode }}?style=2&logo=1&isMask=1&bg=61" alt="QR Code" class="w-32 h-32">
    </div>

    <p class="text-sm text-center text-gray-600 dark:text-gray-400 mb-6">
        {{ __('Vui lòng quét mã QR bằng ứng dụng ngân hàng của bạn để hoàn tất thanh toán.') }}
    </p>

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700 dark:text-gray-300">{{ __('Mã hóa đơn:') }}</span>
            <div class="flex items-center">
                <span id="invoiceCode" class="text-gray-600 dark:text-gray-400 mr-2">{{ $invoiceCode }}</span>
                <button onclick="copyToClipboard('invoiceCode')" class="text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700 dark:text-gray-300">{{ __('Số tiền:') }}</span>
            <span class="text-gray-600 dark:text-gray-400">{{ number_format($totalPrice, 0, ',', '.') }} VND</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700 dark:text-gray-300">{{ __('Ngân hàng:') }}</span>
            <span class="text-gray-600 dark:text-gray-400">MB Bank</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700 dark:text-gray-300">{{ __('Số tài khoản:') }}</span>
            <div class="flex items-center">
                <span id="accountNumber" class="text-gray-600 dark:text-gray-400 mr-2">104567890</span>
                <button onclick="copyToClipboard('accountNumber')" class="text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700 dark:text-gray-300">{{ __('Chủ tài khoản:') }}</span>
            <div class="flex items-center">
                <span id="accountHolder" class="text-gray-600 dark:text-gray-400 mr-2">Trần Lê Huy Hoàng</span>
                <button onclick="copyToClipboard('accountHolder')" class="text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <a href="https://vietqr.co/api/generate/mb/104567890/VIETQR.CO/{{ (int)$totalPrice }}/{{ $invoiceCode }}?style=2&logo=1&isMask=1&bg=61" download="QR_Code.png" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            {{ __('Tải mã QR') }}
        </a>
    </div>
</div>

<script>
function copyToClipboard(elementId) {
    const el = document.getElementById(elementId);
    const text = el.innerText;
    navigator.clipboard.writeText(text).then(function() {
        alert('Đã sao chép: ' + text);
    }, function(err) {
        console.error('Không thể sao chép text: ', err);
    });
}
</script>
