<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public static function getCommentsByUser()
    {
        return self::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function isAvailable(): bool
    {
        return $this->user_id === auth()->user()->id;
    }

}
