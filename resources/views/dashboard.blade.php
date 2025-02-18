<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] text-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center mx-20 border-b-2 border-[#94918f]">
                    <div class="flex p-6">
                        {{ __("You're logged in!") }}
                    </div>
                    <div class="p-6">
                        <form action="{{ route('posts.search') }}" method="GET">
                            <div class="relative">
                                <input type="text" id="search" name="query"
                                    class="py-4 px-10 border bg-transparent border-[#94918f] rounded-lg pl-10"
                                    placeholder="Search" value="{{ request('query') }}">
                                <i
                                    class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                            </div>
                        </form>
                    </div>
                    <div class="p-6">
                        <a href="{{ route('posts.create') }}" class="py-4 px-10 rounded-lg border border-[#94918f]">
                            New Post
                        </a>
                    </div>
                </div>
                <div id="post-container"
                    class="mx-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    @if(request('query'))
                    <h3 class="text-lg font-semibold text-center my-4">
                        Search Results for "{{ request('query') }}"
                    </h3>
                    @endif

                    @foreach($posts as $post)
                    <div class="card max-w-xs m-10">
                        <x-cld-image public-id="{{ $post->post_image_public_id }}" class="card-img-top size-60" />
                        <div class="card-body">
                            <h5 class="my-2 card-title text-xl font-semibold">{{ $post->post_title }}</h5>
                            <p class="my-2 card-text text-justify h-32">{{ Str::limit($post->post_description, 150) }}
                            </p>
                            <div class="text-sm flex space-between mt-4">
                                <a href="{{ route('posts.detailAdmin', $post->id) }}"
                                    class="border border-[#94918f] py-2 px-4 rounded">
                                    Read More
                                </a>
                                <p class="font-medium italic mx-auto my-auto">Updated at: {{
                                    \Carbon\Carbon::parse($post->created_at)->timezone('Asia/Jakarta')->diffForHumans()
                                    }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-5 mb-10">
                    <x-pagination-link-component :paginator="$posts" />
                </div>
            </div>
        </div>
    </div>
    </div>
</x-user-layout>