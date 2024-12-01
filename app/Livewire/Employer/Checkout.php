<?php

namespace App\Livewire\Employer;

use App\Jobs\CheckPayment;
use App\Models\Service;
use App\Models\ShoppingCart;
use App\Models\Invoice; // Assuming you have an Invoice mode
use Livewire\Component;

class Checkout extends Component
{
    public $services;
    public $quantities = [];
    public $totalAmount = 0;
    public $invoice; // To store the retrieved invoice
    public $purchasedServices = []; // Array to hold purchased services
    public function mount($code)
    {

        $this->services = Service::all();
        foreach ($this->services as $service) {
            $this->quantities[$service->id] = 0;
        }

        $this->invoice = $this->getInvoiceByCode($code);
        if ($this->invoice) {
            $this->purchasedServices = $this->invoice->purchasedServices; // Fetch purchased services
        }
    }

    public function getInvoiceByCode($code)
    {
        return Invoice::where('invoice_code', $code)->first(); // Fetch invoice by code
    }

    public function updateQuantity($serviceId, $quantity)
    {
        $this->quantities[$serviceId] = $quantity;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalAmount = 0;
        foreach ($this->services as $service) {
            $this->totalAmount += $service->price * $this->quantities[$service->id];
        }
    }

    public function render()
    {
        return view('livewire.employer.pay', [
            'invoice' => $this->invoice, // Pass the invoice to the view
        ]);
    }

    public function submitOrder()
    {
        $user = auth()->user();
        
        if (!$user) {
            dd('Lỗi: Người dùng chưa đăng nhập');
        }

        try {
            foreach ($this->quantities as $serviceId => $quantity) {
                if ($quantity > 0) {
                    $service = Service::findOrFail($serviceId);
                    $existingCartItem = ShoppingCart::where('user_id', $user->id)
                        ->where('service_id', $serviceId)
                        ->first();

                    if ($existingCartItem) {
                        // Update existing cart item
                        $existingCartItem->quantity += $quantity;
                        $existingCartItem->total_price += $service->price * $quantity;
                        $existingCartItem->save();
                    } else {
                        // Create new cart item
                        $cartItem = ShoppingCart::create([
                            'user_id' => $user->id,
                            'service_id' => $serviceId,
                            'quantity' => $quantity,
                            'total_price' => $service->price * $quantity,
                        ]);

                        if (!$cartItem) {
                            throw new \Exception('Không thể thêm dịch vụ vào giỏ hàng');
                        }
                    }
                }
            }
            
            session()->flash('message', 'Đơn hàng đã được lưu vào giỏ hàng.');
            return redirect('/recruiter/shopping-carts');
        } catch (\Exception $e) {
            dd('Lỗi khi thêm vào giỏ hàng: ' . $e->getMessage());
        }
    }
}