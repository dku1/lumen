<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('main.index', compact('posts'));
    }
}