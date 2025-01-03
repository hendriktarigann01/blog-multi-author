<x-app-layout>
    <div
        class="bg-[#e9e6e4] w-full h-screen md:h-auto px-5 sm:px-10 md:px-20 lg:px-40 py-10 sm:py-16 md:py-20 text-cyan-800 justify-center overflow-y-auto">
        <div class="flex justify-center items-center">
            <p class="text-3xl sm:text-4xl md:text-5xl font-extrabold my-5">{{ $post->post_title }}</p>
        </div>
        <div class="flex flex-col sm:flex-row justify-between items-center sm:items-start my-4 sm:my-6 md:my-8">
            <p class="italic font-medium text-sm sm:text-base md:text-lg mb-2 sm:mb-0">{{ $post->created_at }}</p>
            <a class="relative mt-2 sm:mt-0" href="{{ route('article') }}">
                <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-black"></span>
                <span
                    class="fold-bold relative inline-block h-full w-full rounded border-2 border-black bg-[#e9e6e4] px-3 py-1 text-sm sm:text-base font-bold text-cyan-800 transition duration-100 hover:bg-cyan-800 hover:text-white">
                    Back To Article
                </span>
            </a>
        </div>
        <div class="flex justify-center md:justify-start">
            <img src="{{ url('images/posts/' . $post->post_image) }}" alt="Post Image"
                class="rounded my-10 w-80 h-80 md:w-72 md:h-72">
        </div>
        <p class="text-justify text-sm sm:text-base md:text-lg leading-relaxed mx-5 md:mx-0">{{ $post->post_description}}</p>
    </div>
</x-app-layout>
