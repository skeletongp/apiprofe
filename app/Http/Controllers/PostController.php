<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function App\Http\Helpers\catchError;
use function App\Http\Helpers\success;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','comments.user')
            ->where('university_id', auth()->user()->university_id)
            ->paginate(2, ['*'], 'page', request()->page);

        return success(PostResource::collection($posts), null, 'Posts');
    }

    public function toggleLike(Post $post, User $user)
    {
        //check if user has liked the post
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create([
                'user_id' => $user->id
            ]);
        }

        return success(PostResource::make($post), null, 'Like toggled');
    }
    public function storePostQuestion(Request $request)
    {
        try {
            $request->validate([
                'question' => 'required',
            ]);

            $post = Post::create([
                'title' => $request->question,
                'content' => $request->question,
                'user_id' => auth()->user()->id,
                'university_id' => auth()->user()->university_id,
                'type' => 'question'
            ]);

            return success(PostResource::make($post), null, 'Post created');
        } catch (\Throwable $th) {
           return catchError($th);
        }
    }
    public function update(Request $request, Post $post)
    {
        try {

            $post->update($request->all());
            return success(PostResource::make($post), null, 'Post updated');
        } catch (\Throwable $th) {
            return catchError($th);
        }
    }
    public function storeComment(Request $request, Post $post)
    {
        try {
            $request->validate([
                'comment' => 'required',
            ]);

            $comment = $post->comments()->create([
                'content' => $request->comment,
                'user_id' => auth()->user()->id,
            ]);

            return success($comment, null, 'Comment created');
        } catch (\Throwable $th) {
            return catchError($th);
        }
    }
    public function comments(Post $post)
    {
        $comments = $post->comments()->with('user','comments.user')->orderBy('created_at','desc')->paginate(20, ['*'], 'page', request()->page);
        $comments= $comments->getCollection();
        return success($comments, null, 'Comments');
    }
}
