<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Category;


class CreatePost extends Component
{
    public $categories; // Tambahkan properti

    public function mount()
    {
        // Ambil data kategori dari database
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.posts.create-post')->layout('layouts.livewire');
    }
}
