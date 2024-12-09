<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Checkpayment extends Controller
{
    public function checkInvoice($invoice_code)
    {
        // Tìm hóa đơn theo mã hóa đơn
        $invoice = Invoice::where('invoice_code', $invoice_code)->where('status', 'pending')->first();
        $invoiceUpdated = false; // Cờ để theo dõi nếu hóa đơn đã được cập nhật

        if (!$invoice) {
            return response()->json(['status' => 'error', 'message' => 'Hóa đơn không tồn tại hoặc đã được thanh toán.']);
        }

        // Gọi API để lấy danh sách giao dịch
        $url = 'https://my.sepay.vn/userapi/transactions/list';
        $accountNumber = '104567890';
        $limit = 10;

        // Khởi tạo cURL
        $ch = curl_init();

        // Thiết lập các tùy chọn cho cURL
        curl_setopt($ch, CURLOPT_URL, $url . '?account_number=' . $accountNumber . '&limit=' . $limit);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ZTAMVHYFPJWVYTNXQWXEMAP5IOBUADBMH079LUDYBQJQRZLHZTUI2TXS3LS8F8PL',
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // Thực hiện yêu cầu cURL
        $response = curl_exec($ch);

        // Kiểm tra lỗi cURL
        if (curl_errno($ch)) {
            return response()->json(['status' => 'error', 'message' => 'Lỗi kết nối đến API.']);
        }

        // Đóng cURL
        curl_close($ch);

        // Giải mã phản hồi JSON
        $data = json_decode($response, true);

        // Kiểm tra nếu phản hồi thành công
        if (isset($data['status']) && $data['status'] === 200 && $data['messages']['success']) {
            $transactions = $data['transactions'] ?? [];
            $formattedAmount = number_format($invoice->total_price, 0, ',', '');

            foreach ($transactions as $transaction) {
                if (
                    $transaction['amount_in'] == $formattedAmount &&
                    strpos($transaction['transaction_content'], $invoice->invoice_code) !== false
                ) {
                    $invoice->markAsPaid(); // Đảm bảo phương thức này được định nghĩa trong model Invoice
                    $invoiceUpdated = true; // Đặt cờ thành true vì chúng ta đã cập nhật hóa đơn

                    Log::info("Invoice {$invoice->invoice_code} has been marked as paid.");
                    return response()->json(['status' => 'success', 'message' => 'Thanh toán thành công đơn hàng!.']);

                }
            }
        } else {
            Log::error('API response does not contain successful transactions or status code is incorrect.');
        }
        return response()->json(['status' => 'error', 'message' => 'Đơn hàng chưa thanh toán!.']);

        // Trả về thông tin về việc hóa đơn đã được cập nhật
    }
}
