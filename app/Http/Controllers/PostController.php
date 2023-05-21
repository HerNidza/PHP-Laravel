<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search']))->paginate(6)->withQueryString(), // We can create our own filters in Model - structure: it has to start with 'scope'+Name | for the request(['search']) it has to be in [] because it returns string without, or request()->only('search')
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
//            'comments' => $post->comments()->latest()->get() // If we want to sort comments from latest
        ]);
    }


}
