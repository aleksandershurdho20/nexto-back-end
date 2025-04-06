<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Models\Comment; 
use App\Models\Post; 

class Replies extends Model
{
    use HasFactory;
    public function post():BelongsTo {
        return $this->belongsTo(Post::class);
    }
    public function comment():BelongsTo {
        return $this->belongsTo(Comment::class);
    }
    protected $fillable = ['content','post_id','comment_id'];
}
