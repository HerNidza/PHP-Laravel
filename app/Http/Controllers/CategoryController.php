<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
//    public function index(Category $category)
//    {
//        return view('posts.index', [
//            'posts' => $category->posts,
//            'currentCategory' => $category,
//            'categories' => Category::all()
//        ]);
//    }
    public function index(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(6)->withQueryString();

        return view('posts.index', [
            'posts' => $posts,
            'currentCategory' => $category,
            'categories' => Category::all()
        ]);
    }
}
