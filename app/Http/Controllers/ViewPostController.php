<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ViewPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('post_users_id', Auth::id())->paginate(8);
        return view('dashboard', compact('posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('post_users_id', Auth::id())
            ->where(function ($q) use ($query) {
                $q->where('post_title', 'LIKE', "%{$query}%")
                    ->orWhere('post_description', 'LIKE', "%{$query}%");
            })
            ->paginate(8);

        if ($request->ajax()) {
            return view('livewire.posts.post-search', compact('posts'))->render();
        }

        return view('dashboard', compact('posts'));
    }
}
