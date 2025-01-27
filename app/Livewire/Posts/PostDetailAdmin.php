<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostDetailAdmin extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.posts.post-detail-admin')->layout('layouts.livewire');
    }
}
