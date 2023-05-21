<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'JohnDoe',
            'email' => 'johndoe@gmail.com'
        ]);
        $category = Category::factory()->create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $category2 = Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $category3 = Category::factory()->create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        Post::factory(30)->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]); // Check post factory how it creates everything (Users and Categories)
    }
}
