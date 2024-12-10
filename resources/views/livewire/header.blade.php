<header class="flex sticky top-0 w-full bg-white bg-opacity-70 py-4 px-6 backdrop-blur-sm z-50">
    <div class="flex w-full max-w-[1256px] mx-auto justify-between items-center">
        <a href="/" class="flex">
            <img src="{{ asset('assets/img.png') }}" alt="logo" class="h-10" />
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="/" class="py-2 hover:text-blue-600">Home</a>
            <a href="/about" class="py-2 hover:text-blue-600">About</a>
            <a href="/contact" class="py-2 hover:text-blue-600">Contact</a>
            <a href="https://our-works.pages.dev/" class="text-black py-2 hover:text-blue-600">Our Works</a>

            @if(!$user)
                <a href="/login" class="py-2 hover:text-blue-600">Sign in</a>
            @else
                <button wire:click="logout" class="py-2 hover:text-blue-600">Log out</button>
            @endif
        </div>

        <button class="md:hidden block text-gray-800 focus:outline-none" wire:click="$dispatch('toggleMenu')">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </button>
    </div>

</header>
