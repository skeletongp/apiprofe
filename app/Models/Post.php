<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'university_id',
        'bg_color',
        'text_color',
        'type',
        'status'
    ];

    protected $appends = [
        'photo'
    ];

    static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->comments()->delete();
        });

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });

        static::created(function ($post) {
            $post->slug = $post->slug . '-' . $post->id;
            $post->save();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function votes(){
        return $this->morphMany(Vote::class, 'votable');
    }

    public function likes(){
        return $this->morphMany(Like::class, 'likeable');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function photo():Attribute{
        return Attribute::make(
            get: fn() => $this->image?$this->image->path:"",
        );
    }


}
