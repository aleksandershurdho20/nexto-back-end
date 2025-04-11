<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInsights extends Model
{
    use HasFactory;

    protected $fillable = ['post_id'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function likes()
    {
        return $this->hasMany(PostLikes::class);
    }
    public function dislikes()
    {
        return $this->hasMany(PostDislikes::class);
    }
}


