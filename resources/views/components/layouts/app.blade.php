<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen w-full bg-white dark:bg-gray-900">
    <div class="overflow-auto px-3" style="height:calc(100vh - 40px)">
        {{ $slot }}
    </div>
</body>

</html>
