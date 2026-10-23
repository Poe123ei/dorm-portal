
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dorm Portal' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800">
    <nav class="bg-blue-900 text-white">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center gap-6 px-6 py-4">
            <a href="{{ route('home') }}" class="text-xl font-bold">
                Dorm Portal
            </a>
            <a href="{{ route('roomcheck.index') }}" class="hover:underline">
                Room Inspections
            </a>
            <a href="{{ route('events.index') }}" class="hover:underline">
                Worship Events
            </a>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-6 py-8">
        @if (session('status'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800" role="status">
                {{ session('status') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
