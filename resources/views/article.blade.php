<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/article.scss'])
</head>

<body class="antialiased font-sans">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="blog text-cyan-800 ">

            <div class="blog-part is-menu">
                @if (Route::has('login'))
                <livewire:navbar.navigation />
                @endif
            </div>
            <div class="blog-header blog-is-sticky">
                <div class="blog-article header-article">
                    <div class="blog-big__title">Category</div>
                    <div class="small-title"></div>
                </div>
                <div class="blog-article page-number">
                    NO. 01
                </div>
            </div>
            <div class="blog-header-container">

                <div class="blog-header">
                    <div class="blog-article header-article">
                        <div class="blog-big__title">sadad</div>
                        <div class="small-title"></div>
                    </div>
                    <div class="blog-article">
                        <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Fitness" class="mb-2">
                        <p>asdasda</p>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"
                                viewBox="0 0 24 24">
                                <path d="M15 10l5 5-5 5" />
                                <path d="M4 4v7a4 4 0 004 4h12" />
                            </svg>
                            See More
                        </a>
                    </div>
                </div>
            </div>

            <div class="blog-part right-blog">
                <marquee width="100%" direction="left">
                    <span>Now And Then You Miss It Sounds Make You Cry</span>
                    <span>Now In - MoMa Sharing Exhibition NOW</span>
                    <span>NYC Opens After Long Lockdown Check</span>
                </marquee>
                <div class="blog-right-title-container">
                    <div class="blog-right-title">
                        Featured Articles
                    </div>
                    <div class="blog-menu rounded">See All</div>
                </div>
                <div class="blog-right">
                    <div class="blog-right-container">
                        <div class="blog-title-date">
                            <div class="blog-right-page">asdasd</div>
                            <div class="date">1231231</div>
                        </div>
                        <div class="blog-right-page-title">asda</div>
                        <div class="blog-right-page-subtitle">adadasda</div>
                    </div>
                    <div class="circle">
                        <div class="circle-title">Don't Worry About What Other People Think</div>
                        <div class="circle-subtitle">let it go. be unique, memorable, confident, but mainly be you</div>
                        <div class="circle-footer">© 2024 Hendrik. All Rights Reserved</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
