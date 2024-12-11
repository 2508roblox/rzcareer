<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Invoice;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Cron extends Component
{
    public function mount()
    {
        $unpaidInvoices = Invoice::where('status', 'pending')->get();
        $invoiceUpdated = false; // Flag to track if any invoice was updated

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
            return;
        }

        // Đóng cURL
        curl_close($ch);

        // Giải mã phản hồi JSON
        $data = json_decode($response, true);

        // Kiểm tra nếu phản hồi thành công


        // Kiểm tra nếu tồn tại các giao dịch
        if (isset($data['status']) && $data['status'] === 200 && $data['messages']['success']) {
            $transactions = $data['transactions'] ?? [];

            foreach ($unpaidInvoices as $invoice) {
                $formattedAmount = number_format($invoice->total_price, 0, ',', '');

                foreach ($transactions as $transaction) {
                    if (
                        $transaction['amount_in'] == $formattedAmount &&
                        strpos($transaction['transaction_content'], $invoice->invoice_code) !== false
                    ) {
                        $invoice->markAsPaid(); // Ensure this method is defined in your Invoice model

                        broadcast(new MessageSent([
                            'invitation_code' => $invoice->invoice_code,
                            'customer_id' => $invoice->user_id
                        ]));

                        Log::info("Invoice {$invoice->invoice_code} has been marked as paid.");
                        $invoiceUpdated = true; // Set flag to true since we updated an invoice

                        break;
                    }
                }
            }
        } else {
            Log::error('API response does not contain successful transactions or status code is incorrect.');
        }


        // Return whether an invoice was updated to frontend
        return response()->json(['invoiceUpdated' => $invoiceUpdated]);
    }

    public function render()
    {
        return view('livewire.cron');
    }
}
