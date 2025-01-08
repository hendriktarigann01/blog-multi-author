<x-app-layout>
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
            <div class="items-center page-number">
                <img src="https://user-images.githubusercontent.com/5713670/87202985-820dcb80-c2b6-11ea-9f56-7ec461c497c3.gif"
                    width="100px" height="100px" class="animate-floatBounce hidden">
            </div>
        </div>
        <div class="blog-header-container">
            @foreach ($categories as $category)
            @if ($loop->first)
            <div class="bar flex justify-center items-center m-auto">
                <svg  viewBox="0 -0.5 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 7.75C5.08579 7.75 4.75 8.08579 4.75 8.5C4.75 8.91421 5.08579 9.25 5.5 9.25V7.75ZM19.5 9.25C19.9142 9.25 20.25 8.91421 20.25 8.5C20.25 8.08579 19.9142 7.75 19.5 7.75V9.25ZM5.5 11.75C5.08579 11.75 4.75 12.0858 4.75 12.5C4.75 12.9142 5.08579 13.25 5.5 13.25V11.75ZM17.5 13.25C17.9142 13.25 18.25 12.9142 18.25 12.5C18.25 12.0858 17.9142 11.75 17.5 11.75V13.25ZM5.5 15.75C5.08579 15.75 4.75 16.0858 4.75 16.5C4.75 16.9142 5.08579 17.25 5.5 17.25V15.75ZM12.5 17.25C12.9142 17.25 13.25 16.9142 13.25 16.5C13.25 16.0858 12.9142 15.75 12.5 15.75V17.25ZM5.5 9.25H19.5V7.75H5.5V9.25ZM5.5 13.25H17.5V11.75H5.5V13.25ZM5.5 17.25H12.5V15.75H5.5V17.25Z"
                        fill="#000000" />
                </svg>
                <svg id="close-icon" class="icon-close hidden" xmlns="http://www.w3.org/2000/svg" width="30px"
                    height="30px" viewBox="0 0 24 24" fill="none">
                    <path d="M6 6L18 18M6 18L18 6" stroke="#000" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div id="navigation" class="hidden">
                <livewire:navbar.navigation />
            </div>
            @endif

            <div class="blog-header">
                <div class="blog-article header-article">
                    <div class="title-mobile">Category</div>
                    <div class="blog-big__title">{{ $category->category_name }}</div>
                    <div class="small-title"></div>
                </div>
                <div class="blog-article">
                    @if ($category->category_name === 'Technology')
                    <img src="https://images.unsplash.com/photo-1607706189992-eae578626c86?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Technology" class="mb-2 rounded-lg">
                    @elseif ($category->category_name === 'Fitness')
                    <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Fitness" class="mb-2 rounded-lg">
                    @endif
                    <p>{{ Str::limit($category->category_description, 200) }}</p>
                    <a href="{{ route('category.show', $category->id) }}" class="see-more">
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
                {{-- <div class="blog-menu rounded"><a href={{ route('article') }}>See All</a></div> --}}
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
