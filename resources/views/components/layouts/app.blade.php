<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    @vite('resources/css/app.css')

    @livewireStyles
</head>
<body class="flex flex-col min-h-screen">
@livewire('header')
@livewire('mobile-menu')

<div class="flex pt-[76px] ">

    <div class="bg-gray-100">
        @livewire('sidebar')
    </div>
    <div class="w-full">
        @if(request()->is('contact'))
            @livewire('contact')
        @elseif(request()->is('dashboard'))
            @livewire('dashboard')
        @else
            @livewire('content')
        @endif

    </div>
</div>

@livewire('footer')

@livewireScripts
</body>
</html>
