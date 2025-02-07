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
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);

        // Jika ada gambar baru, hapus yang lama dari Cloudinary dan simpan yang baru
        if ($request->hasFile('new_image')) {
            try {
                if (!config('cloudinary.cloud_url')) {
                    throw new \Exception("Cloudinary configuration is missing!");
                }

                // Hapus gambar lama dari Cloudinary jika ada
                if (!empty($post->post_image_public_id)) {
                    Cloudinary()->destroy($post->post_image_public_id);
                }

                // Upload gambar baru ke Cloudinary
                $file = $request->file('new_image');
                $originalFilename = $file->getClientOriginalName();
                $upload = Cloudinary()->upload($file->getRealPath(), [
                    'folder' => 'blog-multi-author',
                ]);

                // Simpan data gambar baru
                $post->post_image = $originalFilename;
                $post->post_image_url = $upload->getSecurePath();
                $post->post_image_public_id = $upload->getPublicId();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
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
