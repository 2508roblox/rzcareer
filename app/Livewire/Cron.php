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
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ZTAMVHYFPJWVYTNXQWXEMAP5IOBUADBMH079LUDYBQJQRZLHZTUI2TXS3LS8F8PL',
        ])->timeout(30)->get('https://my.sepay.vn/userapi/transactions/list', [
            'account_number' => '104567890',
            'limit' => 10,
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
        } else {
            Log::error('Failed to connect to API or request timed out.');
        }
    
        // Return whether an invoice was updated to frontend
        return response()->json(['invoiceUpdated' => $invoiceUpdated]);
    }
    
    public function render()
    {
        return view('livewire.cron');
    }
}