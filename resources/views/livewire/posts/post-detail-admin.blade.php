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
                                class="flex border border-[#94918f] text-[#94918f] justify-center items-center w-10 h-10 rounded">
                                <i class="fa-solid fa-angles-left"></i>
                            </button>
                        </a>
                    </div>
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center sm:items-start my-4 sm:my-6 md:my-8">
                        <p class="italic font-medium text-sm sm:text-base md:text-lg mb-2 sm:mb-0">{{ $post->created_at
                            }}</p>
                        <a class="relative mt-2 sm:mt-0" href="{{ route('dashboard') }}">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-cyan-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-cyan-800 focus:outline-none focus:ring focus:ring-cyan-800 dark:focus:ring-cyan-800">
                                Edit
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
