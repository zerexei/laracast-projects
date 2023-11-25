<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', "Laravel Path")}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="antialiased">
    <div class="min-h-full">
        <x-navigation></x-navigation>

        <x-header>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
        </x-header>

        <main>
            <div id="App" class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Your content -->
                {{ $slot }}
            </div>
        </main>
    </div>
</body>


</html>
