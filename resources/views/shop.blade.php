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
            <div class="flex justify-between p-4">
                <div>Lorem shop</div>
                <livewire:cart />
            </div>
        </div>
    </div>

    <div class="flex grow">
        <nav class="w-64 bg-white border-r border-slate-200">
            <livewire:products-categories />
            <livewire:products-tags />
        </nav>
        <div class="flex-grow p-4 overflow-y-scroll bg-slate-100">
            <div class="container mx-auto">
                <livewire:products-list />
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>