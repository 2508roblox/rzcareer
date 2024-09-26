<?php

namespace App\Livewire\Inc;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        Auth::logout(); // Log out the user

        return redirect('/'); // Redirect to home or any other route
    }
    public function render()
    {
        return view('livewire.inc.header');
    }
}
