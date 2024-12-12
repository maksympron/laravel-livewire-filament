<?php

// SidebarComponent.php (Livewire Component)
namespace App\Livewire;

use App\Enums\IconsEnums;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public $navigation = [];
    public $auth = [];

    public function mount()
    {
        // Use real authenticated user data
        $user = Auth::user();

        if ($user) {
            // Split the user's name into words, and get the first letter of each word
        $nameParts = explode(' ', $user->name);

        // If there are at least two words, take the first letter of each
        $initials = '';
        if (count($nameParts) > 1) {
            $initials = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[1], 0, 1));
        } else {
            // If there's only one word (i.e., only a first name), use the first two letters of it
            $initials = strtoupper(substr($nameParts[0], 0, 2));
        }

        $this->auth = [
            'initials' => $initials,
            'fullName' => $user->name, // Use the full name from the authenticated user
        ];
    }
        // Get the current path to highlight the active navigation item
        $currentPath = request()->path();

        $this->navigation = [
            [
                'name' => 'Dashboard',
                'href' => '/dashboard',
                'path' => IconsEnums::DASHBOARD->value,
                'current' => $currentPath === 'dashboard',
                'fill' => true,
            ],
            [
                'name' => 'Settings',
                'href' => '/settings',
                'path' => IconsEnums::SETTINGS->value,
                'current' => $currentPath === 'settings',
                'fill' => false,
            ],
            [
                'name' => 'Profile',
                'href' => '/profile',
                'path' => IconsEnums::PROFILE->value,
                'current' => $currentPath === 'profile',
                'fill' => true,
            ],
        ];
    }

    public function logout()
    {
        Auth::logout();  // Logout the user
        session()->flash('message', 'Logged out successfully!');
        return redirect()->route('login');  // Redirect to the login page after logging out
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}

