<div>
    <header class="fixed-top bg-navbar py-2">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="/" class="d-flex align-items-center">
            <img src="{{ asset('images/logoHT.png') }}" alt="Logo" width="50" height="50">
        </a>

        <!-- Navigation for Desktop -->
        <nav class="d-none d-md-flex">
            @php
                $navLinks = [
                    ['name' => 'Home', 'path' => '/'],
                    ['name' => 'About', 'path' => '/about'],
                    ['name' => 'Portfolio', 'path' => '/portfolio'],
                    ['name' => 'Contact', 'path' => '/contact'],
                ];
            @endphp

            @foreach ($navLinks as $link)
                <a href="{{ $link['path'] }}"
                   class="nav-link px-3 text-gray-300 {{ Request::is(ltrim($link['path'], '/')) ? 'text-slate-500 active' : '' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </nav>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="collapse" id="mobileMenu">
        <div class="bg-navbar px-3 py-2">
            @foreach ($navLinks as $link)
                <a href="{{ $link['path'] }}"
                   class="d-block nav-link px-3 py-2 text-gray-300 {{ Request::is(ltrim($link['path'], '/')) ? 'text-slate-500 active' : '' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>

<!-- Include Bootstrap Styles and Scripts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</div>
