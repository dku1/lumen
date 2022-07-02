<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.comment.index', compact('comments'));
    }

    public function delete(Comment $comment): RedirectResponse
    {
        $comment->delete();
        session()->flash('warning', 'Комментарий удалён');
        return redirect()->route('admin.comments.index');
    }
}
