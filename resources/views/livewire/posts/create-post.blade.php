<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form untuk Create Post -->
                    <form action="{{ route('posts.dashboard') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="post_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Judul Post
                            </label>
                            <input type="text" name="post_title" id="post_title" required
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label for="post_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tipe Post
                            </label>
                            <input type="text" name="post_type" id="post_type" required
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <div class="mb-4">
                            <label for="post_content"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Konten Post
                            </label>
                            <textarea name="post_content" id="post_content" rows="5" required
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="post_description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Deskripsi Post
                            </label>
                            <textarea name="post_description" id="post_description" rows="3" required
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="post_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Image Post
                            </label>
                            <input type="file" name="post_image" id="image">
                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200 dark:focus:ring-blue-700">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
