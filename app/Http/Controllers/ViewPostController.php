<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ViewPostController extends Controller
{
    public function index()
    {
        // Ambil data post berdasarkan pengguna yang login
        $posts = Post::where('post_users_id', Auth::id())->paginate(8);
        return view('dashboard', compact('posts'));
    }
}
