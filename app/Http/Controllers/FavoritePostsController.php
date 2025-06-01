<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoritePosts;
use App\Models\PostInsights;

use App\Models\Post;

class FavoritePostsController extends Controller
{
    //

    public function SearchFavoritePosts(Request $request){

        $userID = $request->user()->id;
        $searchQuery = $request->query('title');
    $results = Post::join('favorite_posts', 'posts.id', '=', 'favorite_posts.post_id')
        ->where('favorite_posts.user_id', $userID)
        ->where('posts.title', 'like', "%{$searchQuery}%")
        ->select('posts.*')
        ->get();
     if($results->isEmpty()){

        return response()->json([
            'message' => "No favorite post for searched query!"
        ],404);
     }

     return response()->json([
        'message' => 'Retrieved favorite post succesfully!',
        'favorite_posts' => $results
     ],200);



    }

    public function filterPosts(Request $request){
        $userID = $request->user()->id;
        $sortBy = $request->query('sortBy');
    
        $query = Post::join('favorite_posts', 'posts.id', '=', 'favorite_posts.post_id')
            ->where('favorite_posts.user_id', $userID)
            ->select('posts.*');
    
        if ($sortBy === 'recently_added') {
            $posts = $query->orderBy('favorite_posts.created_at', 'desc')->get();
        } elseif ($sortBy === 'most_popular') {
            $posts = $query
                ->join('post_insights', 'posts.id', '=', 'post_insights.post_id')
                ->orderByDesc('post_insights.views')
                ->select('posts.*', 'post_insights.views')
                ->get();
        } else {
            $posts = $query->get(); 
        }
    
        if ($posts->isEmpty()) {
            return response()->json([
                'message' => 'No favorite posts found!'
            ], 404);
        }
    
        return response()->json([
            'favorite_posts' => $posts
        ], 200);
    }
}
