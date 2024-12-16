<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Events\MessageSent;
use App\Models\Invoice;

class CheckPaymentCommand extends Command
{
    protected $signature = 'check:payment';
    protected $description = 'Check and update payment status for invoices';

    public function handle()
    {
        // Lấy danh sách các hóa đơn chưa thanh toán
        $unpaidInvoices = Invoice::where('status', 'pending')->get();

        // Gọi API để lấy danh sách giao dịch
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer FHQMNTA45AVPJTZAUU2C61UZQ3OWBZMFDII1MESK8GXYVPB7NKS7JHYLN0PAXQEL',
        ])->timeout(30)->get('https://my.sepay.vn/userapi/transactions/list', [
            'account_number' => '104567890',
            'limit' => 20,
        ]);

        // Kiểm tra nếu phản hồi thành công
        if ($response->successful()) {
            $data = $response->json();

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
                            $invoice->markAsPaid(); // Cần đảm bảo hàm này đã được định nghĩa

                            broadcast(new MessageSent([
                                'invitation_code' => $invoice->invoice_code,
                                'customer_id' => $invoice->user_id
                            ]));

                            Log::info("Invoice {$invoice->invoice_code} has been marked as paid.");

                            break;
                        }
                    }
                }
            } else {
                Log::error('API response does not contain successful transactions or status code is incorrect.');
            }
        } else {
            Log::error('Failed to connect to API or request timed out.');
        }

        return 0;
    }
}
