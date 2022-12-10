<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use function App\Http\Helpers\success;

class CommentController extends Controller
{
    public function storeComment (Comment $comment, Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->comment
        ]);

        return success($comment, null, 'Comment created');
    }
}
