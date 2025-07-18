<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Polling Interaktif</title>
    @vite('resources/css/app.css');
    <livewire:styles />
</head>

<body class="bg-gray-100 text-gray-900">
    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>
    <livewire:scripts />
</body>

</html>
