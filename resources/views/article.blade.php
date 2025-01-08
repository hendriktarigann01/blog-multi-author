<x-app-layout>
    <div class="blog text-cyan-800 ">
        <div class="blog-part is-menu">
            @if (Route::has('login'))
            <livewire:navbar.navigation />
            @endif
        </div>
        <div class="blog-header blog-is-sticky">
            <div class="blog-article header-article">
                <div class="blog-big__title">Article</div>
                <div class="small-title"></div>
            </div>
            <div class="items-center page-number">
                <img src="https://user-images.githubusercontent.com/5713670/87202985-820dcb80-c2b6-11ea-9f56-7ec461c497c3.gif"
                    width="100px" height="100px" class="animate-floatBounce hidden">
            </div>
        </div>
        <div class="blog-header-container">
            @foreach ($posts as $post)
            @if ($loop->first)
            <div class="bar flex justify-center items-center m-auto">
                <svg id="menu-icon" class="icon-open" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H20" stroke="#000" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                <svg id="close-icon" class="icon-close hidden" xmlns="http://www.w3.org/2000/svg" width="32px"
                    height="32px" viewBox="0 0 24 24" fill="none">
                    <path d="M6 6L18 18M6 18L18 6" stroke="#000" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div id="navigation" class="hidden">
                <livewire:navbar.navigation />
            </div>
            @endif
            <div class="blog-header">
                <div class="blog-article header-article">
                    <div class="title-mobile">Article</div>
                    <div class="blog-big__title">{{ $post->post_title }}</div>
                    <div class="small-title"></div>
                </div>
                <div class="blog-article">
                    <img src="{{ url('images/posts/' . $post->post_image) }}" alt="Image Post" class="mb-2 shadow-lg">
                    <p>{{ Str::limit($post->post_description, 200) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="see-more">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"
                            viewBox="0 0 24 24">
                            <path d="M15 10l5 5-5 5" />
                            <path d="M4 4v7a4 4 0 004 4h12" />
                        </svg>
                        See More
                    </a>
                    @if ($loop->last)
                    <div class="small-title"></div>
                    <x-pagination-link-component :paginator="$posts" />
                    {{-- <p class="flex justify-center">Showing 1 to 3 of 3 entries</p> --}}
                    @endif
                </div>
            </div>
            @endforeach
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
            </div>
            <div class="blog-right">
                @foreach ($posts as $post)
                <div class="blog-right-container">
                    <div class="blog-title-date">
                        <div class="blog-right-page">{{ $loop->iteration }}</div>
                        <div class="date">{{ $post->created_at->format('d.m.Y') }}</div>
                    </div>
                    <div class="blog-right-page-title">{{ $post->post_title }}</div>
                    <div class="blog-right-page-subtitle">{{ Str::limit($post->post_description, 100) }}</div>
                </div>
                @endforeach
                <div class="circle">
                    <div class="circle-title">Don't Worry About What Other People Think</div>
                    <div class="circle-subtitle">let it go. be unique, memorable, confident, but mainly be you</div>
                    <div class="circle-footer">© 2024 Hendrik. All Rights Reserved</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>