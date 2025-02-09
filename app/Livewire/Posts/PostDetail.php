<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostDetail extends Component
{
    public $post;

    public $topViewedPosts;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->post->increment('post_views');
        $this->topViewedPosts = Post::orderBy('post_views', 'desc')->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.posts.post-detail', [
            'topViewedPosts' => $this->topViewedPosts
        ])->layout('layouts.detail');
    }
}
