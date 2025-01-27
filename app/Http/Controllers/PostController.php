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
            'post_description' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('post_image')) {
            $imageName = time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('images/posts'), $imageName);
            $validated['post_image'] = $imageName;
        } else {
            $validated['post_image'] = null;
        }

        $validated['post_users_id'] = Auth::id();

        $post = Post::create($validated);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Post created successfully!',
                'post' => $post,
            ]);
        }

        // Fallback for non-AJAX requests
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
