<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Models\PaymentHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CheckPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 30;
    public $backoff = 60;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Make the GET request to the payment API
            $response = Http::get('https://api.web2m.com/historyapimb/2508robloX*/104567890/3F3C181D-4455-EB63-CF92-F92B7CD0627B');

            // Check if the response was successful
            if ($response->successful()) {
                $data = $response->json();

                // Iterate through each transaction to verify payments
                foreach ($data['data'] as $transaction) {
                    // Extract necessary information from the transaction
                    $description = $transaction['description'];
                    $creditAmount = $transaction['creditAmount'];

                    // Check if the description contains the order_code and if creditAmount matches the order's total
                    if (preg_match('/INV[A-Z0-9]{8}/', $description, $matches)) {
                        $orderCode = $matches[0]; // Extract the matched invoice_code

                        // Find the order based on order_code and creditAmount
                        $order = Invoice::where('invoice_code', $orderCode)
                            ->where('total_price', $creditAmount)
                            ->where('status', 'pending')
                            ->first();

                        if ($order) {
                            // Use a transaction to ensure data integrity
                            DB::transaction(function () use ($order) {
                                // Update the payment status
                                $order->status = 'successful';
                                $order->save();

                                // Create PaymentHistory record
                                PaymentHistory::create([
                                    'user_id'        => $order->user_id,
                                    'invoice_id'     => $order->id,
                                    'balance'        => $order->total_price,
                                    'payment_method' => 'bank_transfer', // Adjust as needed
                                    'status'         => $order->status,
                                    'payment_date'   => now(),
                                ]);
                            });

                            Log::info('Updated order status and created PaymentHistory for order code: ' . $orderCode);
                        } else {
                            Log::warning('No matching order found for order code: ' . $orderCode . ' with amount: ' . $creditAmount);
                        }
                    }
                }
            } else {
                Log::warning('API request failed with status: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Failed to process transaction history: ' . $e->getMessage());
            throw $e; // Re-throw the exception to trigger job retry
        }

        // Dispatch the job again to check after a delay
        self::dispatch()->delay(now()->addSeconds(5)); // Adjusted delay to 60 seconds to match backoff
    }
}
