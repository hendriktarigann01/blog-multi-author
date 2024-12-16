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
            <div class="blog-article page-number">
                NO. 01
            </div>
        </div>
        <div class="blog-header-container">
            @foreach ($posts as $index => $post)
            <div class="blog-header">
                <div class="blog-article header-article">
                    <div class="title-mobile">Article</div>
                    <div class="blog-big__title">{{ $post->post_title }}</div>
                    <div class="small-title"></div>
                </div>
                <div class="blog-article">
                    <img src="{{ url('images/posts/' . $post->post_image) }}" alt="Image Post" class="mb-2 shadow-lg">
                    <p>{{ Str::limit($post->post_description, 200) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}">
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
                    <nav class="flex items-center gap-x-1 justify-center"
                        aria-label="Pagination">
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10"
                            aria-label="First">
                            <span class="sr-only">First</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 18l-6-6 6-6"></path>
                                <path d="M7 18l-6-6 6-6"></path>
                            </svg>
                        </button>
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10"
                            aria-label="Previous">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </button>
                        <div class="flex items-center gap-x-1">
                            <button type="button"
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-gray-200 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 text-cyan-800 dark:focus:bg-white/10"
                                aria-current="page">1</button>
                            <button type="button"
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-transparent hover:bg-gray-100 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10">2</button>
                            <button type="button"
                                class="min-h-[38px] min-w-[38px] flex justify-center items-center border border-transparent hover:bg-gray-100 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10">3</button>
                        </div>
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10"
                            aria-label="Next">
                            <span class="sr-only">Next</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </button>
                        <button type="button"
                            class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent text-cyan-800 dark:hover:bg-white/10 dark:focus:bg-white/10"
                            aria-label="Last">
                            <span class="sr-only">Last</span>
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 6l6 6-6 6"></path>
                                <path d="M17 6l6 6-6 6"></path>
                            </svg>
                        </button>
                    </nav>
                    <p class="flex justify-center">Showing 1 to 3 of 3 entries</p>
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
                <div class="blog-menu rounded"><a href={{ route('article') }}>See All</a></div>
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
