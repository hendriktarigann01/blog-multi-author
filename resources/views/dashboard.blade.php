<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Card 1 -->
                        <div class="card max-w-xs mx-auto">
                            <img class="card-img-top" src="{{ url('storage/images/idcamp.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-xl font-semibold">Card 1</h5>
                                <p class="card-text text-gray-700">Quick example text for card 1.</p>
                                <a href="#" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded">Go
                                    somewhere</a>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="card max-w-xs mx-auto">
                            <img class="card-img-top" src="{{ url('storage/images/idcamp.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-xl font-semibold">Card 2</h5>
                                <p class="card-text text-gray-700">Quick example text for card 2.</p>
                                <a href="#" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded">Go
                                    somewhere</a>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="card max-w-xs mx-auto">
                            <img class="card-img-top" src="{{ url('storage/images/idcamp.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-xl font-semibold">Card 3</h5>
                                <p class="card-text text-gray-700">Quick example text for card 3.</p>
                                <a href="#" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded">Go
                                    somewhere</a>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="card max-w-xs mx-auto">
                            <img class="card-img-top" src="{{ url('storage/images/idcamp.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-xl font-semibold">Card 4</h5>
                                <p class="card-text text-gray-700">Quick example text for card 4.</p>
                                <a href="#" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded">Go
                                    somewhere</a>
                            </div>
                        </div>
                        {{-- <form action="{{ route('posts.dashboard') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="post_title">Judul Post</label>
                                <input type="text" class="text-black" id="post_title" name="post_title" required>
                            </div>

                            <div class="form-group">
                                <label for="post_type">Tipe Post</label>
                                <input type="text" class="text-black" id="post_type" name="post_type" required>
                            </div>

                            <div class="form-group">
                                <label for="post_content">Konten Post</label>
                                <textarea class="text-black" id="post_content" name="post_content" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="post_description">Deskripsi Post</label>
                                <textarea class="text-black" id="post_description" name="post_description" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
