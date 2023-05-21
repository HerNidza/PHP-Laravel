<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class AuthorController extends Controller
{
    public function index(User $author)
    {
        $posts = $author->posts()->latest()->paginate(6)->withQueryString();
        return view('posts.index', [

            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }
}
