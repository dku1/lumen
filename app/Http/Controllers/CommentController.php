<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'message' => $request->message,
        ]);

        return redirect()->route('post', $post);
    }

    public function edit(Comment $comment): Factory|View|Application
    {
        return view('personal.comment-form', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id === auth()->user()->id) {
            $comment->update(['message' => $request->message]);
        }
        return redirect()->route('post', $comment->post);
    }

    public function delete(Comment $comment): RedirectResponse
    {
        if ($comment->user_id === auth()->user()->id) {
            $comment->delete();
        }
        return redirect()->back();
    }
}
