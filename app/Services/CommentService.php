<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService
{
    public function update(Request $request, Comment $comment)
    {
       if ($comment->isAvailable()){
           $comment->update(['message' => $request->message]);
       }
    }

    public function delete(Comment $comment)
    {
        if ($comment->isAvailable()){
            $comment->delete();
        }
    }
}
