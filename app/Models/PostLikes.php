<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    use HasFactory;


    public function user()
{
    return $this->belongsTo(User::class);
}
    public function insight()
{
    return $this->belongsTo(PostInsights::class);
}
protected $fillable = ['post_insights_id', 'user_id'];


}
