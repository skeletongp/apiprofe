<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class NewPost extends Component
{
    use WithFileUploads;
    public  $content, $image;
    public $bgColor="#000000";
    public $colors = [
        '#000000' => 'text-white',
        '#0000ff' => 'text-white',
        '#ff0000' => 'text-white',
        '#ffffff' => 'text-black',
        '#00ff00' => 'text-black',
        
    ];
   

    public function render()
    {
        return view('livewire.posts.new-post');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }

    public function store()
    {
        $this->validate([
            'content' => 'required',
        ]);
        $post=Post::create([
            'title' => ellipsis($this->content, 30),
            'content' => $this->content,
            'university_id' => auth()->user()->university_id,
            'user_id' => auth()->user()->id,
            'bg_color' => $this->bgColor,
            'text_color' => $this->colors[$this->bgColor],
        ]);
        if ($this->image) {
            $post->image()->create([
                'path' => uploadPhoto($this->image, 'posts'),
            ]);
        } else{
            
        }
        $this->reset();
        $this->emit('refreshPosts');
    }

    

   
}
