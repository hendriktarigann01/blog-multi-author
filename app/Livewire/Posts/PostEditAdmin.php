<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostEditAdmin extends Component
{
    use WithFileUploads;

    public $post;
    public $post_title;
    public $post_category_id;
    public $post_description;
    public $post_image;
    public $new_image;
    public $categories;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->post_title = $this->post->post_title;
        $this->post_category_id = $this->post->post_category_id;
        $this->post_description = $this->post->post_description;
        $this->post_image = $this->post->post_image;
        $this->categories = Category::all();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_description' => 'required|string',
            'post_category_id' => 'required|integer|exists:category,id',
            'new_image' => 'nullable|image|max:2048',
        ]);

        $post = Post::findOrFail($id);

        // Jika ada gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('new_image')) {
            // Hapus gambar lama jika ada
            if ($post->post_image && file_exists(public_path('images/posts/' . $post->post_image))) {
                unlink(public_path('images/posts/' . $post->post_image));
            }

            // Simpan gambar baru ke folder public/images/posts
            $image = $request->file('new_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Gunakan timestamp untuk nama unik
            $image->move(public_path('images/posts'), $imageName); // Simpan ke folder

            $post->post_image = $imageName; // Simpan hanya nama file ke database
        }

        // Update post
        $post->update([
            'post_title' => $request->post_title,
            'post_category_id' => $request->post_category_id,
            'post_description' => $request->post_description,
        ]);

        return redirect()->route('posts.edit', ['id' => $post->id])->with('message', 'Post updated successfully.');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('livewire.posts.post-edit-admin', compact('post', 'categories'));
    }


    public function render()
    {
        return view('livewire.posts.post-edit-admin')->layout('layouts.livewire');
    }
}
