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
            <div class="blog-article page-number">
                NO. 01
            </div>
        </div>
        <div class="blog-header-container">
            @foreach ($categories as $category)
            <div class="blog-header">
                <div class="blog-article header-article">
                    <div class="title-mobile">Category</div>
                    <div class="blog-big__title">{{ $category->category_name }}</div>
                    <div class="small-title"></div>
                </div>
                <div class="blog-article">
                    @if ($category->category_name === 'Technology')
                    <img src="https://images.unsplash.com/photo-1607706189992-eae578626c86?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Technology" class="mb-2">
                    @elseif ($category->category_name === 'Fitness')
                    <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Fitness" class="mb-2">
                    @endif
                    <p>{{ $category->category_description }}</p>
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
