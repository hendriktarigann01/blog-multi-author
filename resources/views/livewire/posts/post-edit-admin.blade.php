<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#e9e6e4] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-cyan-800">
                    <div class="flex justify-between mb-3 pb-3 border-b-2 border-[#94918f]">
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold">Edit Post</p>
                        <a href="{{ route('posts.detailAdmin', $post->id) }}">
                           <x-button-back />
                        </a>
                    </div>

                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="post_title" class="block text-sm font-medium">Post Title</label>
                            <input type="text" id="post_title" name="post_title"
                                value="{{ old('post_title', $post->post_title) }}"
                                class="mt-2 text-cyan-800 bg-transparent block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="post_category_id" class="block text-sm font-medium">Category</label>
                            <select name="post_category_id" id="post_category_id"
                                class="mt-2 text-cyan-800 bg-transparent block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->post_category_id == $category->id ?
                                    'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="post_description" class="block text-sm font-medium">Post Description</label>
                            <textarea id="post_description" name="post_description" rows="3"
                                class="mt-2 text-cyan-800 bg-transparent block w-full rounded-md shadow-sm border-[#94918f] focus:ring-cyan-800 focus:border-cyan-800">{{ old('post_description', $post->post_description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="new_image" class="block text-sm font-medium">Current Image</label>
                            <x-cld-image public-id="{{ $post->post_image_public_id }}" alt="Post Image"
                                class="rounded w-40 h-40 object-cover " />
                        </div>

                        <div class="mb-4">
                            <label for="new_image" class="block text-sm font-medium">New Image (Optional)</label>
                            <input type="file" id="new_image" name="new_image"
                                class="block w-full text-sm text-cyan-800 mt-2">
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="submit"
                                class="px-4 py-2 bg-cyan-800 text-white rounded hover:bg-cyan-900 focus:ring focus:ring-cyan-800">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
