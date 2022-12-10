<?php

namespace App\Http\Livewire\Interactions;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Likes extends Component
{
    public $model, $likes, $isLiked;

    public function render()
    {
        $this->likes=DB::table('likes')->where('likeable_id',$this->model->id)
        ->where('likeable_type',get_class($this->model))->where('deleted_at',null)->count();
        $this->isLiked=(bool) DB::table('likes')->where('likeable_id',$this->model->id)
        ->where('likeable_type',get_class($this->model))->where('deleted_at',null)->where('user_id',auth()->user()->id)->count();
        return view('livewire.interactions.likes');
    }

    public function toggleLike()
    {
        $user=auth()->user();
        if($user->hasLiked($this->model)){
          
            $this->model->likes()->where('user_id', $user->id)->forcedelete();
        }else{
            $this->model->likes()->create([
                'user_id' => $user->id,
                
            ]);
        }
        sleep(0.4);
        $this->render();
    }
}
