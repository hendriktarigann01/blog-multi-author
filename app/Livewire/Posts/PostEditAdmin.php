<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostEditAdmin extends Component
{
    use WithFileUploads;

    public $post;
    public $post_title;
    public $post_category_id;
    public $post_description;
    public $post_image;
    public $new_image;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->post_title = $this->post->post_title;
        $this->post_category_id =  Category::all();
        $this->post_description = $this->post->post_description;
        $this->post_image = $this->post->post_image;
    }

    public function editPost()
    {
        $this->validate([
            'post_title' => 'required|string|max:255',
            'post_description' => 'required|string',
            'post_category_id' => 'required|string|max:255',
            'new_image' => 'nullable|image|max:2048',
        ]);

        // Hapus gambar lama jika ada gambar baru
        if ($this->new_image) {
            if ($this->post->post_image && Storage::exists('images/posts/' . $this->post->post_image)) {
                Storage::delete('images/posts/' . $this->post->post_image);
            }

            // Simpan gambar baru
            $newImageName = $this->new_image->store('images/posts', 'public');
            $this->post->update(['post_image' => $newImageName]);
        }

        // Update data lainnya
        $this->post->update([
            'post_title' => $this->post_title,
            'post_category_id' => $this->post_category_id,
            'post_description' => $this->post_description,
        ]);

        session()->flash('message', 'Post updated successfully.');
        return redirect()->route('posts.detailAdmin', $this->post->id);
    }

    public function render()
    {
        return view('livewire.posts.post-edit-admin')->layout('layouts.livewire');
    }
}
