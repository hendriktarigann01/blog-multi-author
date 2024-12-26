<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostDetail extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->post->increment('post_views');
    }

    public function render()
    {
        return view('livewire.posts.post-detail')->layout('layouts.app');
    }
}
