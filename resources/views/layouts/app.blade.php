<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Portal TPL SVIPB'))</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    {{-- Laravel default styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom CSS (khusus halaman anak) --}}
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen d-flex flex-column">
        {{-- 🔹 NAVBAR --}}
        @include('partials.navbar')

        {{-- 🔹 HERO SECTION (kalau ada di halaman anak) --}}
        @yield('hero')

        {{-- 🔹 MAIN CONTENT --}}
        <main class="flex-grow-1">
            @yield('content')
        </main>

        {{-- 🔹 FOOTER (opsional, bisa dikosongkan dulu) --}}
        @include('partials.footer')

        {{-- Scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
            integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
            crossorigin="anonymous"></script>
        @stack('scripts')
    </div>
</body>

</html>