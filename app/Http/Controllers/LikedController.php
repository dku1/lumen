<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class LikedController extends Controller
{
    public function liked(Post $post): RedirectResponse
    {
        auth()->user()->likes()->toggle($post);
        return redirect()->back();
    }
}
