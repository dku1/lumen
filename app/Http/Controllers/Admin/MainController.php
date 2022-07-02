<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        $postsCount = Post::all()->count();
        $commentsCount = Comment::all()->count();
        return view('admin.main', compact('postsCount', 'commentsCount'));
    }
}
