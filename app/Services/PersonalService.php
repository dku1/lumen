<?php

namespace App\Services;

use App\Models\Comment;

class PersonalService
{
    public function getLastComments(): array
    {
        $result = [];
        $comments = Comment::getCommentsByUser();

        foreach ($comments as $comment) {
            $lastComment = $comment->post->comments->last();
            if (!in_array($lastComment, $result)){
                $result[] = $lastComment;
            }
        }

        return $result;
    }
}
