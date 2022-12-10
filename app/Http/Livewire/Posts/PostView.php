<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostView extends Component
{
    public $perPage = 12;
    protected $listeners = [
        'load-more' => 'loadMore',
        'refreshPosts' => 'refreshPosts',
    ];
    public function render()
    {
        $posts=Post::latest()
        ->with('user','comments.user')
        ->orderBy('created_at','desc')
        ->paginate($this->perPage);
        return view('livewire.posts.post-view', compact('posts'));
    }
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function refreshPosts(){
        $this->render();
    }   
}
