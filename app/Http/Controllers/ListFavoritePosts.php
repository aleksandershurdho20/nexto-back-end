<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FavoritePosts;
use App\Models\User;
use App\Models\Post;

class ListFavoritePosts extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        $userID = auth()->id();
        $favoritePosts = Post::join('favorite_posts', 'posts.id', '=', 'favorite_posts.post_id')
        ->where('favorite_posts.user_id', $userID)
        ->select('posts.*') 
        ->get();
        

        return response()->json($favoritePosts, 200);


    }
}
