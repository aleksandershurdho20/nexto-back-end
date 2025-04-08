<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; 
use App\Models\Replies; 

use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description','is_published'];
    protected $casts = [
        'is_published' => 'boolean'

    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
    public function replies(): HasMany {
        return $this->hasMany(Replies::class);
    }
    public function postInsight()
    {
        return $this->hasOne(PostInsight::class);
    }
}
