<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class CategoryDetail extends Component
{
    public $category;
    public $topViewedPosts;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);

        $this->topViewedPosts = Post::orderBy('post_views', 'desc')->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.category.category-detail', [
            'topViewedPosts' => $this->topViewedPosts
        ])->layout('layouts.app');
    }
}
