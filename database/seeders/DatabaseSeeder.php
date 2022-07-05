<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = User::factory(40)->create();
        Category::factory(15)->create();
        $tags = Tag::factory(30)->create();
        $posts = Post::factory(100)->create();
        Comment::factory(1000)->create();

        foreach ($posts as $post){
            $tagIds = $tags->random(rand(0,10))->pluck('id');
            $userIds = $users->random(rand(0,40))->pluck('id');
            $post->tags()->attach($tagIds);
            $post->likes()->attach($userIds);
        }
    }
}
