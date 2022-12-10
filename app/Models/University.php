<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class University extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'central',
        'type'
    ];

    static function boot()
    {
        parent::boot();

        static::creating(function ($university) {
            $university->slug = Str::slug($university->name);
        });
    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
