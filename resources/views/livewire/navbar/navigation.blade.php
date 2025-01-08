<nav>
    @auth
    <a href="{{ url('/dashboard') }}" class="blog-menu text-center hover:text-cyan-600 my-2">
        Dashboard
    </a>
    @else
    <a href="{{ route('home') }}" class="blog-menu text-center hover:text-cyan-600 my-2">
        Home
    </a>
    <a href="{{ route('article') }}" class="blog-menu text-center hover:text-cyan-600 my-2">
        Article
    </a>
    <a href="{{ route('login') }}" class="blog-menu text-center hover:text-cyan-600 my-2">
        Log in
    </a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="blog-menu text-center hover:text-cyan-600 my-2">
        Register
    </a>
    @endif
    @endauth
</nav>
