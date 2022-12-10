<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'university_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    protected $appends = [
        'avatar'
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function sedes()
    {
        return $this->belongsToMany(Sede::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function hasLiked($model){
        return (bool) $model->likes->where('user_id', $this->id)->count();
    }

    public function avatar():Attribute
    {
        return Attribute::make(
           get: fn()=> $this->image->path ?: 'https://ui-avatars.com/api/?name=' . $this->name
        );
    }

}
