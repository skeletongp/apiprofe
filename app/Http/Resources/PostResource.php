<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo,
            'slug' => $this->slug,
            'bg_color' => $this->bg_color,
            'text_color' => $this->text_color,
            'university' => $this->whenLoaded('university'),
            'status' => $this->status=='pendiente'?'Sin Resolver':'Resuelto',
            'comments' => $this->whenLoaded('comments'),
            'likes' => $this->whenLoaded('likes'),
            'likes_count' => count($this->likes),
            'type' => $this->type,
            'is_liked' => $this->likes->contains('user_id', auth()->id()),
            'is_commented' => $this->comments->contains('user_id', auth()->id()),
            'comments_count' => count($this->comments),
            'user' =>  $this->whenLoaded('user'),
            'created_at' => formatDate($this->created_at, 'd/m/Y'),
            'updated_at' => formatDate($this->updated_at, 'd/m/Y'),
            'since'=>ago($this->created_at),
        ];
    }
}
