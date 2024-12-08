<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_type' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_description' => 'required|string',
        ]);

        $validated['post_users_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
}
