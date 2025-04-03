<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request -> validate ([
            'title' => ['required','string','max:255'],
            'description' => ['required','string']
        ]);
        $data['slug']= Str::slug($data['title']);
        // Post::create($request -> all());
        auth() ->user() -> posts() -> create($data);
        return response() ->json([
            'status' => 'success',
            'message' => 'Post created succesfully'
        ],status:201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
