<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="flex p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                    <div class="p-6">
                        <form action="">
                            <div class="relative">
                                <input type="text"
                                    class="py-4 px-10 border bg-transparent text-gray-900 border-blue-500 rounded-lg pl-10"
                                    placeholder="Search" name="" id="">
                                <i
                                    class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            </div>
                        </form>
                    </div>
                    <div class="p-6">
                        <a href="{{ route('posts.create') }}" class="py-4 px-10 rounded-lg bg-blue-500 text-white">
                            New Post
                        </a>
                    </div>
                </div>
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($posts as $post)
                        <div class="card max-w-xs m-10">
                            <img class="card-img-top size-60" src="{{ url('images/posts/' . $post->post_image) }}"
                                alt="{{ $post->post_title }}">
                            <div class="card-body">
                                <h5 class="card-title text-xl font-semibold">{{ $post->post_title }}</h5>
                                <p class="card-text text-gray-700">{{ $post->post_description }}</p>
                                <a href="#" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded">
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
