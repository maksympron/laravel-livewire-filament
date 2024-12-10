<div>
    @if ($isMenuOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-40" wire:click="toggleMenu"></div>
        <div class="fixed right-0 top-0 h-full  w-full bg-white shadow-md z-50">
            <button class="absolute top-4 right-4" wire:click="toggleMenu">Close</button>
            <nav>
                <a href="/" class="block px-4 py-2 hover:bg-gray-100">Home</a>
                <a href="/about" class="block px-4 py-2 hover:bg-gray-100">About</a>
                <a href="/contact" class="block px-4 py-2 hover:bg-gray-100">Contact</a>
            </nav>
        </div>
    @endif
</div>
