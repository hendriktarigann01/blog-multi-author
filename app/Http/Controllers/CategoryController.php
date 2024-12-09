<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Mengambil semua data
        return view('welcome', compact('categories')); // Mengirim data ke view 'welcome'
    }
}
