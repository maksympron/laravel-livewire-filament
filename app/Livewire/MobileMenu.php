<?php

namespace App\Livewire;

use Livewire\Component;

class MobileMenu extends Component
{
    public $isMenuOpen = false;

    protected $listeners = ['toggleMenu'];


    public function toggleMenu()
    {
        $this->isMenuOpen = !$this->isMenuOpen;
    }

    public function render()
    {
        return view('livewire.mobile-menu');
    }
}
