<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        {
            $query = Post::with('comments');
                
            if ($request->has('id')) {
                $posts = $query->where('id', $request->id)->first();
                return response()->json($posts);
            }
            
        
            $posts = $query->get();
            
            return response()->json($posts);
        }
    }
}
