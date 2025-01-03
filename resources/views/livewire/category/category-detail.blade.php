<x-app-layout>
    <div
        class="bg-[#e9e6e4] w-full h-screen md:h-auto px-5 sm:px-10 md:px-20 lg:px-40 py-10 sm:py-16 md:py-20 text-cyan-800 justify-center overflow-y-auto">
        <div class="flex justify-center items-center">
            <p class="text-3xl sm:text-4xl md:text-5xl font-extrabold my-5">{{ $category->category_name }}</p>
        </div>
        <div class="flex flex-col sm:flex-row justify-between items-center sm:items-start my-4 sm:my-6 md:my-8">
            <p class="italic font-medium text-sm sm:text-base md:text-lg mb-2 sm:mb-0">{{ $category->created_at }}</p>
            <a class="relative mt-2 sm:mt-0" href="{{ route('home') }}">
                <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-black"></span>
                <span
                    class="fold-bold relative inline-block h-full w-full rounded border-2 border-black bg-[#e9e6e4] px-3 py-1 text-sm sm:text-base font-bold text-cyan-800 transition duration-100 hover:bg-cyan-800 hover:text-white">
                    Back To Home
                </span>
            </a>
        </div>
        <div class="flex justify-center md:justify-start">
            @if ($category->category_name === 'Technology')
            <img src="https://images.unsplash.com/photo-1607706189992-eae578626c86?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Technology" class="rounded my-10 w-80 h-80 md:w-72 md:h-72">
            @elseif ($category->category_name === 'Fitness')
            <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Fitness" class="rounded my-10 w-80 h-80 md:w-72 md:h-72">
            @endif
        </div>
        <p class="text-justify text-sm sm:text-base md:text-lg leading-relaxed mx-5 md:mx-0">{{$category->category_description }}</p>
        <div class="grid grid-cols-3 gap-4 items-center justify-center">
            <div>1</div>
            <div>2</div>
            <div>3</div>
        </div>
    </div>
</x-app-layout>
