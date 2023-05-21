<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category', 'author']; // For eager loading it can be here as well instead of ->with('category', 'author') was 'user'

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter() | $query is passed automatically
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');

        }
    }

    public function category() // $post->category
    {
        return $this->belongsTo(Category::class);
    }

    public function author() // Laravel assumes that foreign key will be now author_id // It was user
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
