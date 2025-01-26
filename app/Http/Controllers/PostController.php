<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_category_id' => 'required|string|max:255',
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

    public function index()
    {
        $posts = Post::inRandomOrder()->limit(5)->get();
        return view('home', compact('posts'));
    }

    public function newPosts($view = 'home')
    {
        $newestPosts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view($view, compact('newestPosts'));
    }

    public function show()
    {
        $posts = Post::paginate(5);
        return view('article', compact('posts'));
    }
}
