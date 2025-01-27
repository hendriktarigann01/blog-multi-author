<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostDetailAdmin extends Component
{
    public $post;

    public function mount()
    {
        $this->post = Post::findOrFail($this->post);
    }

    public function render()
    {
        return view('livewire.posts.post-detail-admin');
    }
}
