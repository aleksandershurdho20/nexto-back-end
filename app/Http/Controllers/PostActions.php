<?php

namespace App\Http\Controllers;
use App\Models\PostInsights;
use App\Models\PostLikes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostActions extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $userId = Auth::id();
        $postInsightsId = $request->post_insights_id;

        if($request->action == "like"){
            $existingLike = PostLikes::where('post_insights_id', $postInsightsId)
            ->where('user_id', $userId)
            ->first();
            if ($existingLike) {
                return response()->json(['message' => 'Already liked.'], 409);
            }

           $likedPost = PostLikes::create([
                'post_insights_id' => $postInsightsId,
                'user_id' => $userId,
                'likes' => 0
            ]);

            $likedPost->increment("likes");

            return response()->json(['message' => 'Post liked succesfully!', 'likedPost' => $likedPost]);
        
        }
    }
}
