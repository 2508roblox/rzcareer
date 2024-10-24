<?php

namespace App\Livewire\Employer;

use Livewire\Component;
use App\Models\Service;
use App\Models\ShoppingCart;

class Order extends Component
{
    public $services;
    public $quantities = [];
    public $totalAmount = 0;

    public function mount()
    {
        $this->services = Service::all();
        foreach ($this->services as $service) {
            $this->quantities[$service->id] = 0;
        }
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
        return view('livewire.employer.order');
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
