<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Campaign App')</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-50"> {{-- Tambah bg-gray agar kontras --}}
    
    @include('partials.header')

    <main class="flex-grow container mx-auto px-4 py-8"> {{-- Tambah container, mx-auto, dan padding --}}
        @yield('content')
    </main>
    
    @include('partials.footer')

</body>
</html>