<div>
    <x-dropdown>
        <!-- Trigger Dropdown -->
        <x-slot name="trigger">
            <button class="px-4 py-2 bg-gray-200 rounded">
                {{ $selectedCategory
                ? $categories->firstWhere('id', $selectedCategory)?->category_name
                : 'Pilih Kategori' }}
            </button>
        </x-slot>

        <!-- Content Dropdown -->
        <x-slot name="content">
            @foreach ($categories as $category)
            <a href="#" wire:click.prevent="selectCategory({{ $category->id }})"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                {{ $category->category_name }}
            </a>
            @endforeach
        </x-slot>
    </x-dropdown>
</div>