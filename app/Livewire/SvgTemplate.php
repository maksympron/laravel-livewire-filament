<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\IconsEnums;

class SvgTemplate extends Component
{
    public $width;
    public $height;
    public $path;
    public $classes;

    public function mount($width = 24, $height = 24, IconsEnums $path = null, $classes = '')
    {
        $this->width = $width;
        $this->height = $height;
        $this->path = $path?->value; // Extract the SVG path from the enum
        $this->classes = $classes;
    }

    public function render()
    {
        return view('livewire.svg-template');
    }
}
