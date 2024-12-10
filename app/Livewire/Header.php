<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Header extends Component
{ public $user;

    public function mount()
    {
        $this->user = Auth::user(); // Load the authenticated user
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect to the login page after logout
    }
    public function render()
    {
        return view('livewire.header');
    }
}
