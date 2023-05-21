<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [

        ]);
    }

    public function store()
    {

        $post = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required|max:1000',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $slug = Str::slug($post['title']);
        $post['slug'] = $slug;

        $count = Post::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $post['slug'] .= '-' . ($count + 1); // append a unique identifier to the slug
        }

        $post['user_id'] = auth()->user()->id;
        $post['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($post);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required|max:1000',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $slug = Str::slug($post['title']);
        $post['slug'] = $slug;

        if (isset($attributes['thumbnail'])) {
            $post['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect('/')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('success', 'Post Deleted');
    }
}
