<x-app-layout>
    <div class="bg-[#e9e6e4] w-full h-screen px-40 py-20 text-cyan-800 justify-center overflow-y-auto">
        <div class="flex justify-center align-center">
            <p class="text-5xl font-extrabold mb-10">{{ $post->post_title }}</p>
        </div>
        <div class="flex justify-between my-2 mb-10">
            <p class="italic font-medium text-lg">{{ $post->created_at }}</p>
            <a class="relative" href="{{ route('article') }}">
                <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-black"></span>
                <span
                    class="fold-bold relative inline-block h-full w-full rounded border-2 border-black bg-[#e9e6e4] px-3 py-1 text-base font-bold text-cyan-800 transition duration-100 hover:bg-cyan-800 hover:text-white">Back
                    To Article</span>
            </a>
        </div>
        <img src="{{ url('images/posts/' . $post->post_image) }}" alt="Post Image" width="300px" height="300px"
            class="rounded mb-10">
        <p>{{ $post->post_description }}</p>
    </div>
</x-app-layout>
