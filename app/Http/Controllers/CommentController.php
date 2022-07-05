<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public CommentService $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request, Post $post): RedirectResponse
    {
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'message' => $request->message,
        ]);

        return redirect()->route('posts.show', $post);
    }

    public function edit(Comment $comment): Factory|View|Application
    {
        return view('personal.comment-form', compact('comment'));
    }

    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $this->service->update($request, $comment);
        return redirect()->route('posts.show', $comment->post);
    }

    public function delete(Comment $comment): RedirectResponse
    {
        $this->service->delete($comment);
        return redirect()->back();
    }
}
