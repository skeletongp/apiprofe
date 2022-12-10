<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sede extends Model
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

    
}
