<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lorem shop</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col h-screen bg-white">
    <!-- Header -->
    <div class="border-b border-slate-200">
        <div class="container mx-auto">
            <div class="flex justify-between py-4">
                <div>Lorem shop</div>
                <livewire:cart />
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <a href="{{route('shop')}}" wire:navigate.hover class="flex text-gray-500 py-4 text-gray-500 hover:text-blue-600">
            Retour à la boutique
        </a>
        <livewire:product-page :slug="$slug" />

    </div>

    @livewireScripts
</body>

</html>