<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get()->take(3);
        return view('main.index', compact('posts', 'popularPosts'));
    }

    public function categories(): Factory|View|Application
    {
        $categories = Category::getMainCategories();
        $delimiter = '';
        return view('main.categories', compact('categories', 'delimiter'));
    }


}
