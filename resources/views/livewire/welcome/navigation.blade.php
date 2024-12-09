<nav>
    @auth
    <a href="{{ url('/dashboard') }}"
        class="blog-menu">
        Dashboard
    </a>
    @else
    <a href="{{ route('home') }}"
        class="blog-menu">
        Home
    </a>
    <a href="{{ route('article') }}"
        class="blog-menu">
        Article
    </a>
    <a href="{{ route('login') }}"
        class="blog-menu">
        Log in
    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
        class="blog-menu">
        Register
    </a>
    @endif
    @endauth
</nav>
