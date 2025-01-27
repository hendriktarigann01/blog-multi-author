<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] text-cyan-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center mx-20 border-b border-[#94918f]">
                    <div class="flex p-6">
                        {{ __("You're logged in!") }}
                    </div>
                    <div class="p-6">
                        <form action="">
                            <div class="relative">
                                <input type="text"
                                    class="py-4 px-10 border bg-transparent border-[#94918f] rounded-lg pl-10"
                                    placeholder="Search" name="" id="">
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
                <div class="container">
                    <div class="mx-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($posts as $post)
                        <div class="card max-w-xs m-10">
                            <img class="card-img-top size-60" src="{{ url('images/posts/' . $post->post_image) }}"
                                alt="{{ $post->post_title }}">
                            <div class="card-body">
                                <h5 class="my-2 card-title text-xl font-semibold">{{ $post->post_title }}</h5>
                                <p class="my-2 card-text">{{ $post->post_description }}</p>
                                <a href="{{ route('posts.detailAdmin', $post->id) }}" class="mt-4 border border-[#94918f] py-2 px-4 rounded">
                                    Read More
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
