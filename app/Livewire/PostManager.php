<?php

namespace App\Livewire;

use Livewire\Component;

class PostManager extends Component
{
    public function render()
    {
        return view('livewire.post-manager');
    }

    public $title, $content;

    public function createPost()
    {
        $this->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->reset(['title', 'content']);
        session()->flash('message', 'Artikel berhasil dibuat!');
    }

}
