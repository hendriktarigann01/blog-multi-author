<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between">
                    <div class="flex p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                    <a href="{{ route('posts.create') }}" class="flex p-6 bg-blue-500 text-white items-center">
                        New Post
                    </a>
                </div>
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($posts as $post)
                        <div class="card max-w-xs mx-auto">
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
</x-app-layout>
