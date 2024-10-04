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

    <x-header />
    {{ $slot }}

    @livewireScripts
</body>

</html>