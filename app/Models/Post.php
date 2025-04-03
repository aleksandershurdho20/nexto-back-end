<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
