<?php

namespace App\Jobs;

use App\Events\MessageSent;
use App\Models\Invoice;
use App\Models\WeddingInvitation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 30;
    public $backoff = 60;

    /**
     * Execute the job.
     */
    public function handle()
    {
 
        // Retrieve all unpaid invitations
        $unpaidInvitations = Invoice::where('status', 'pending')->get();
        // Call API to get the transaction list
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ZTAMVHYFPJWVYTNXQWXEMAP5IOBUADBMH079LUDYBQJQRZLHZTUI2TXS3LS8F8PL',
        ])->get('https://my.sepay.vn/userapi/transactions/list', [
            'account_number' => '104567890',
            'limit' => 20,
        ]);

        // Check if the response was successful
        if ($response->successful()) {
            $data = $response->json();

            // Check if transactions exist
            if ($data['status'] === 200 && $data['messages']['success']) {
                $transactions = $data['transactions']; // Transaction list

                // Loop through each unpaid invitation
                foreach ($unpaidInvitations as $invitation) {
                    // Format the total amount to match the format used in transactions
                    $formattedAmount = number_format($invitation->total_price, 0, ',', '');

                    // Check each transaction
                    foreach ($transactions as $transaction) {
             
                        // If transaction matches the amount and contains the invitation code, mark as paid
                 
                        if (
                            $transaction['amount_in'] == $formattedAmount &&
                            strpos($transaction['transaction_content'], $invitation->invoice_code) !== false
                        ) {
                            $invitation->markAsPaid(); // Update the invitation to paid
                            broadcast(new MessageSent([
                                'invitation_code' => $invitation->invoice_code,
                                'customer_id' => $invitation->user_id
                            ])); // Send a message to notify the payment

                            // Stop further checks for this invitation as it's now paid
                            break;
                        }
                    }
                }
            }
        }

        self::dispatch()->delay(now()->addSeconds(5));  
    }
}
