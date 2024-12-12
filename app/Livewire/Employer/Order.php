<?php

namespace App\Livewire\Employer;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Service;
use App\Models\ShoppingCart;

class Order extends Component
{
    use LivewireAlert;
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

        // Check if no services are selected
        $totalSelected = array_sum($this->quantities);
        if ($totalSelected === 0) {
            $this->alert('error', 'Vui lòng chọn ít nhất một dịch vụ.'); // Use LivewireAlert
            return; // Don't redirect, just show the alert
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
                        ShoppingCart::create([
                            'user_id' => $user->id,
                            'service_id' => $serviceId,
                            'quantity' => $quantity,
                            'total_price' => $service->price * $quantity,
                        ]);
                    }
                }
            }

            $this->alert('success', 'Đơn hàng đã được lưu vào giỏ hàng.'); // Success alert
            return redirect('/recruiter/shopping-carts');
        } catch (\Exception $e) {
            $this->alert('error', 'Lỗi khi thêm vào giỏ hàng: ' . $e->getMessage());
        }
    }
}
