<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostInsights;

class PostShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        {
            $query = Post::with(['comments', 'replies','postInsight.likes', 'postInsight.dislikes','user:id,name']);
        
            if ($request->has('id')) {
                $post = $query->where('id', $request->id)->first();
    
                if ($post) {
                    $postInsight = $post->postInsight;
    
                    if (!$postInsight) {
                        $postInsight = PostInsights::create([
                            'post_id' => $post->id,
                            'views' => 0, 
                            'likes' => 0, 
                            'dislikes' => 0,  
                        ]);
                    }
    
                    $postInsight->increment('views');
    
                    return response()->json($post);
                }
    
                return response()->json(['message' => 'Post not found'], 404);
            }
    
            $posts = $query->get();
            return response()->json($posts);
        
        }
    }
}
