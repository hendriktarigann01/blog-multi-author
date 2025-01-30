<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-cyan-800">
                    <div class="flex justify-between mb-3 pb-3 border-b-2 border-[#94918f]">
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold">{{ $post->post_title }}</p>
                        <a href="{{ route('dashboard') }}">
                            <button
                                class="flex border border-[#94918f] text-[#94918f] justify-center items-center w-10 h-10 rounded hover:border-cyan-800 hover:text-cyan-800 transition duration-200">
                                <i class="fa-solid fa-angles-left"></i>
                            </button>
                        </a>
                    </div>
                    <div class="flex justify-between mt-10">
                        <div class="flex items-center justify-center">
                            <p>Created at: {{
                                \Carbon\Carbon::parse($post->created_at)->timezone('Asia/Jakarta')->format('d
                                M Y H:i') }}</p>
                            <i class="fa-solid fa-arrow-right-long mx-2"></i>
                            <p>Updated at: {{
                                \Carbon\Carbon::parse($post->updated_at)->timezone('Asia/Jakarta')->format('d
                                M Y H:i') }}</p>
                        </div>

                        <a href="{{ route('posts.update', $post->id) }}" class="relative mt-2 sm:mt-0">
                            <button
                               class="flex border border-[#94918f] text-[#94918f] justify-center items-center w-10 h-10 rounded hover:border-cyan-800 hover:text-cyan-800 transition duration-200">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                    </div>
                    <div class="flex justify-center md:justify-start">
                        <img src="{{ url('images/posts/' . $post->post_image) }}" alt="Post Image"
                            class="rounded my-10 w-full object-cover h-96">
                    </div>
                    <p class="text-justify text-sm sm:text-base md:text-lg leading-relaxed mx-5 md:mx-0">
                        {{ $post->post_description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>