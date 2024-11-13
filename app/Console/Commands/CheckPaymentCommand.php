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
        try {
            // Retrieve all unpaid invoices
            $unpaidInvoices = Invoice::where('status', 'pending')->get();

            // Call API to get the transaction list
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ZTAMVHYFPJWVYTNXQWXEMAP5IOBUADBMH079LUDYBQJQRZLHZTUI2TXS3LS8F8PL',
            ])->timeout(30)->get('https://my.sepay.vn/userapi/transactions/list', [
                'account_number' => '104567890',
                'limit' => 20,
            ]);

            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();

                // Check if transactions exist
                if ($data['status'] === 200 && $data['messages']['success']) {
                    $transactions = $data['transactions'];

                    foreach ($unpaidInvoices as $invoice) {
                        $formattedAmount = number_format($invoice->total_price, 0, ',', '');

                        foreach ($transactions as $transaction) {
                            if (
                                $transaction['amount_in'] == $formattedAmount &&
                                strpos($transaction['transaction_content'], $invoice->invoice_code) !== false
                            ) {
                                $invoice->markAsPaid();

                                broadcast(new MessageSent([
                                    'invitation_code' => $invoice->invoice_code,
                                    'customer_id' => $invoice->user_id
                                ]));

                                break;
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('CheckPayment command failed: ' . $e->getMessage());
        }

        return 0;
    }
}
