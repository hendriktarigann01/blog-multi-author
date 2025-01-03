<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class CategoryDetail extends Component
{
    public $category;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
    }



    public function render()
    {
        return view('livewire.category.category-detail')->layout('layouts.app');
    }
}
