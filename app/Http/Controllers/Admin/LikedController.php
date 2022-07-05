<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function popularPosts(): Factory|View|Application
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(8);
        $totalCount = Post::all()->count();
        return view('admin.post.index', compact('posts', 'totalCount'));
    }
}
