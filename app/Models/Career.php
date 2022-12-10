<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'university_id',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'career_subjects');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'career_teachers');
    }
}
