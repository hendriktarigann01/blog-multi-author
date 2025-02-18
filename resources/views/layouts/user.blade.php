<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />
        <!-- Page Content -->
        <main>
            {{ $slot }}
            @livewireScripts
        </main>
    </div>
</body>

{{-- jquery searching --}}
<script>
    document.getElementById('search').addEventListener('keyup', function () {
        let query = this.value;
        let newUrl = window.location.origin + window.location.pathname + '?query=' + encodeURIComponent(query);

        window.history.pushState({ path: newUrl }, '', newUrl);

        fetch('{{ route('posts.search') }}' + '?query=' + encodeURIComponent(query), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('post-container').innerHTML = data;
        });
    });
</script>

</html>
