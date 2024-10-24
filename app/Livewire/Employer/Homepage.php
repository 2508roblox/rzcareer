<?php

namespace App\Livewire\Employer;

use Livewire\Component;
use App\Models\Service;

class Homepage extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.employer.homepage');
    }
}
