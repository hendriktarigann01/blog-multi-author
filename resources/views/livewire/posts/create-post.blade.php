<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-cyan-800">
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}">
                            <button
                                class="flex border border-[#94918f] text-[#94918f] justify-center items-center w-10 h-10 rounded">
                                <i class="fa-solid fa-angles-left"></i>
                            </button>
                        </a>
                    </div>
                    <!-- Form untuk Create Post -->
                    <form action="{{ route('posts.dashboard') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="post_title" class="block text-sm font-medium">
                                Judul Post
                            </label>
                            <input type="text" name="post_title" id="post_title" required
                                class="mt-2 text-cyan-800 block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800">
                        </div>

                        <div class="mb-4">
                            <label for="post_category_id" class="block text-sm font-medium">
                                Category
                            </label>
                            <select wire:model="post_category_id" id="post_category_id" name="post_category_id"
                                class="mt-2 text-cyan-800 block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="post_content" class="block text-sm font-medium">
                                Konten Post
                            </label>
                            <textarea name="post_content" id="post_content" rows="5" required
                                class="mt-2 text-cyan-800 block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="post_description" class="block text-sm font-medium">
                                Deskripsi Post
                            </label>
                            <textarea name="post_description" id="post_description" rows="3" required
                                class="mt-2 text-cyan-800 block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800"></textarea>
                        </div>

                      <div class="mb-4">
                        <label for="post_image" class="block text-sm font-medium">
                            Image Post
                        </label>
                        <div class="mt-2 flex items-center justify-center w-full">
                            <label for="post_image"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-[#94918f] border-dashed rounded-lg cursor-pointer bg-[#e9e6e4] hover:bg-[#d5d2cf]">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-cyan-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-cyan-800"><span class="font-semibold">Click to upload</span> or drag and
                                        drop
                                    </p>
                                    <p class="text-xs text-[#94918f]">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="post_image" name="post_image" type="file" class="hidden">
                            </label>
                        </div>
                    </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-cyan-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-cyan-800 focus:outline-none focus:ring focus:ring-cyan-800 dark:focus:ring-cyan-800">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
</x-user-layout>
