<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_type' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_description' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('post_image')) {
            $imageName = time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('images/posts'), $imageName);
            $validated['post_image'] = $imageName;
        } else {
            $validated['post_image'] = null; // Jika tidak ada gambar, biarkan null
        }

        $validated['post_users_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
}
