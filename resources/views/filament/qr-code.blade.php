@php
    $qrData = json_encode([
        'invoiceCode' => $invoiceCode,
        'totalPrice' => $totalPrice,
        'userId' => $userId,
    ]);
    $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($qrData);
@endphp

<div class="flex flex-col justify-center items-center p-4">
    <img src="{{ $qrUrl }}" alt="QR Code for Payment" />
    <p class="mt-4">Tổng tiền: {{ number_format($totalPrice, 0, ',', '.') }} VND</p>
    <p>Mã hóa đơn: {{ $invoiceCode }}</p>
</div>
