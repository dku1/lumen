<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post): Factory|View|Application
    {
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();
        return view('post.show', compact('post', 'comments'));
    }

    public function discussed(): Factory|View|Application
    {
        $posts = Post::withCount('comments')->orderBy('comments_count', 'desc')->get()->take(10);
        return view('post.discussed', compact('posts'));
    }

    public function top(): Factory|View|Application
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get()->take(10);
        return view('post.top', compact('posts'));
    }
}
