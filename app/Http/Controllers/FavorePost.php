<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoritePosts;

class FavorePost extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        $hasLikedThePost = FavoritePosts::where('post_id',$request->post_id);

        if($hasLikedThePost->first()){
            $hasLikedThePost->delete();
            return response()->json(
                [
                    'message' => 'Post removed from favorites!'

                ],200
                );
        }
        FavoritePosts::create($request->all());

        return response()->json([
            'message' => 'Post added to favorites!'
        ],201);
    }
}
