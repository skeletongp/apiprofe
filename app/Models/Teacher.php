<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'university_id',
    ];

    static function boot()
    {
        parent::boot();

       static::creating(function ($teacher) {
            $teacher->slug = Str::slug($teacher->name);
        });
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function sedes()
    {
        return $this->belongsToMany(Sede::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
    
    public function votes(){
        return $this->morphMany(Vote::class, 'votable');
    }


}
