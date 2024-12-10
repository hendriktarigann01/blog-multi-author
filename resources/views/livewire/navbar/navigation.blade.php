<nav>
    @auth
    <a href="{{ url('/dashboard') }}" class="blog-menu hover:text-cyan-600 inline-block">
        Dashboard

    </a>
    @else
    <a href="{{ route('home') }}" class="blog-menu hover:text-cyan-600 inline-block">
        Home

    </a>
    <a href="{{ route('article') }}" class="blog-menu hover:text-cyan-600 inline-block">
        Article

    </a>
    <a href="{{ route('login') }}" class="blog-menu hover:text-cyan-600 inline-block">
        Log in

    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="blog-menu hover:text-cyan-600 inline-block">
        Register

    </a>
    @endif
    @endauth
</nav>

