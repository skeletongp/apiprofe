<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class PostCard extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.posts.post-card');
    }

   
}
