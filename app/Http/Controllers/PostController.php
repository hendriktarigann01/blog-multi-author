<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'post_title' => 'required|string|max:255',
            'post_category_id' => 'required|string|max:255',
            'post_description' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('post_image')) {
            $imageName = time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('images/posts'), $imageName);
            return $imageName;
        }

        return null;
    }

    private function handleResponse(Request $request, Post $post)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Post created successfully!',
                'post' => $post,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        // Handle file upload
        $validated['post_image'] = $this->handleImageUpload($request);

        $validated['post_users_id'] = Auth::id();

        $post = Post::create($validated);

        return $this->handleResponse($request, $post);
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

    public function showPosts()
    {
        $posts = Post::paginate(5);
        return view('article', compact('posts'));
    }

    public function showRunningText($view = 'home')
    {
        $showRunningText = RunningText::all();
        return view($view, compact('showRunningText'));
    }
}
