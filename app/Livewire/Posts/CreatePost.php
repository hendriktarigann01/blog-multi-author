<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class CreatePost extends Component
{
    public function create()
    {
        return redirect(route('posts.create'));
    }

    public function render()
    {
        return view('livewire.posts.create-post');
    }
}
