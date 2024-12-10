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

<div class="flex flex-1">

    <div class="w-1/4 bg-gray-100">
        @livewire('sidebar')
    </div>
    <div class="w-3/4">
        @if(request()->is('contact'))
            @livewire('contact')
        @else
            @livewire('content')
        @endif
    </div>
</div>

@livewire('footer')

@livewireScripts
</body>
</html>