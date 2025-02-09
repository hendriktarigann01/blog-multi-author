<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'post_title' => 'required|string|max:255',
            'post_category_id' => 'required|string|max:255',
            'post_description' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'post_image.mimes' => 'Format gambar harus berupa JPEG, PNG, JPG, atau GIF.',
            'post_image.image' => 'File yang diunggah harus berupa gambar.',
        ]);
    }


    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('post_image')) {
            try {
                if (!config('cloudinary.cloud_url')) {
                    throw new \Exception("Cloudinary configuration is missing!");
                }

                $file = $request->file('post_image');

                $originalFilename = $file->getClientOriginalName();

                if ($file->isValid()) {
                    $upload = Cloudinary()->upload($file->getRealPath(), [
                        'folder' => 'blog-multi-author',
                    ]);

                    $publicId = $upload->getPublicId();
                    $imageUrl = $upload->getSecurePath();

                    return [
                        'url' => $imageUrl,
                        'public_id' => $publicId,
                        'original_filename' => $originalFilename,
                    ];
                }

                return null;
            } catch (\Exception $e) {
                return null;
            }
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
        try {
            $validated = $this->validateRequest($request);

            $imageData = $this->handleImageUpload($request);

            if ($imageData) {
                $validated['post_image_url'] = $imageData['url'];
                $validated['post_image_public_id'] = $imageData['public_id'];
                $validated['post_image'] = $imageData['original_filename'];
            }

            $validated['post_users_id'] = Auth::id();

            $post = Post::create($validated);

            return $this->handleResponse($request, $post);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
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
