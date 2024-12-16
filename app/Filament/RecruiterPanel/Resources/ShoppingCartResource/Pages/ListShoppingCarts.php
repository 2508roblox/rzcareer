<?php

namespace App\Filament\RecruiterPanel\Resources\ShoppingCartResource\Pages;

use App\Filament\RecruiterPanel\Resources\ShoppingCartResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Invoice;
use App\Models\ShoppingCart;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use App\Models\PurchasedService;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListShoppingCarts extends ListRecords
{
    protected static string $resource = ShoppingCartResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\Action::make('goToServices')
                ->label('Danh sách dịch vụ')
                ->url('/employer/order'), // Adjust the route name as needed
            Actions\Action::make('createInvoice')
                ->label('Tạo hóa đơn')
                ->icon('heroicon-o-document-text')
                ->action(function () {
                    $user = auth()->user();
                    $cartItems = ShoppingCart::where('user_id', $user->id)->get();

                    if ($cartItems->isEmpty()) {
                        Notification::make()
                            ->title('Giỏ hàng trống')
                            ->body('Không thể tạo hóa đơn cho giỏ hàng trống.')
                            ->danger()
                            ->send();
                        return;
                    }

                    $totalPrice = $cartItems->sum('total_price');
                    $invoiceCode = $this->generateUniqueInvoiceCode();

                    DB::transaction(function () use ($user, $totalPrice, $invoiceCode, $cartItems) {
                        $invoice = Invoice::create([
                            'invoice_code' => $invoiceCode,
                            'user_id' => $user->id,
                            'total_price' => $totalPrice,
                            'status' => 'pending',
                        ]);

                        foreach ($cartItems as $cartItem) {
                            // Retrieve the Service model instance
                            $service = Service::find($cartItem->service_id);

                            if ($service) { // Check if the service exists
                                PurchasedService::create([
                                    'user_id' => $user->id,
                                    'service_id' => $service->id,
                                    'invoice_id' => $invoice->id,
                                    'status' => 'pending',
                                    'quantity' => $cartItem->quantity * $service->job_post_count,
                                    'used_quantity' => 0,
                                    'purchase_date' => now(),
                                    'expiration_date' => now()->addDays($service->duration), // Adjusted for clarity
                                ]);
                            }
                        }

                        // Clear the shopping cart after invoice creation
                        ShoppingCart::where('user_id', $user->id)->delete();
                    });

                    Notification::make()
                        ->title('Hóa đơn đã được tạo')
                        ->body("Mã hóa đơn: {$invoiceCode}")
                        ->success()
                        ->send();
                }),
        ];
    }

    private function generateUniqueInvoiceCode(): string
    {
        do {
            $code = 'INV' . strtoupper(Str::random(8));
        } while (Invoice::where('invoice_code', $code)->exists());

        return $code;
    }
    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Get the current user's ID
        $userId = Auth::id();

        // Return the query filtered by the user's ID
        return parent::getTableQuery()->where('user_id', $userId);
    }
}
