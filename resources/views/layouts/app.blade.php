<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admit Portal' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 text-white px-6 py-4 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-xl">Admit Portal</a>
            <div>
                <a href="{{ route('admit.create') }}" class="ml-4 hover:underline">Create</a>
                <a href="{{ route('admit.list') }}" class="ml-4 hover:underline">List</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4">
        @yield('content')
    </main>
</body>
</html>
